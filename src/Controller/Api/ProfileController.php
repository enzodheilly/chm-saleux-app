<?php

namespace App\Controller\Api;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class ProfileController extends AbstractController
{
    #[Route('/api/profile', name: 'api_profile_update', methods: ['PUT', 'PATCH'])]
    public function updateProfile(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $user = $this->getUser();

        if (!$user instanceof User) {
            return $this->json(['message' => 'Utilisateur non authentifié'], 401);
        }

        $payload = json_decode($request->getContent(), true);

        if (!is_array($payload)) {
            return $this->json(['message' => 'Payload JSON invalide'], 400);
        }

        $firstName = isset($payload['firstName']) ? trim((string) $payload['firstName']) : null;
        $lastName  = isset($payload['lastName']) ? trim((string) $payload['lastName']) : null;

        if ($firstName !== null) {
            if ($firstName === '' || mb_strlen($firstName) < 2) {
                return $this->json(['message' => 'Prénom invalide'], 422);
            }
            if (method_exists($user, 'setFirstName')) {
                $user->setFirstName($firstName);
            }
        }

        if ($lastName !== null) {
            if ($lastName === '' || mb_strlen($lastName) < 2) {
                return $this->json(['message' => 'Nom invalide'], 422);
            }
            if (method_exists($user, 'setLastName')) {
                $user->setLastName($lastName);
            }
        }

        // ✅ Mensurations — données personnelles : on revalide les bornes côté
        // serveur (ne jamais faire confiance uniquement au picker mobile),
        // en plus des contraintes Assert déclarées sur l'entité.
        if (array_key_exists('heightCm', $payload)) {
            $heightCm = $payload['heightCm'] === null ? null : (int) $payload['heightCm'];
            if ($heightCm !== null && ($heightCm < 100 || $heightCm > 250)) {
                return $this->json(['message' => 'Taille invalide'], 422);
            }
            $user->setHeightCm($heightCm);
        }

        if (array_key_exists('weightKg', $payload)) {
            $weightKg = $payload['weightKg'] === null ? null : (int) $payload['weightKg'];
            if ($weightKg !== null && ($weightKg < 30 || $weightKg > 300)) {
                return $this->json(['message' => 'Poids invalide'], 422);
            }
            $user->setWeightKg($weightKg);
        }

        if (array_key_exists('age', $payload)) {
            $age = $payload['age'] === null ? null : (int) $payload['age'];
            if ($age !== null && ($age < 10 || $age > 120)) {
                return $this->json(['message' => 'Âge invalide'], 422);
            }
            $user->setAge($age);
        }

        $em->flush();

        return $this->json([
            'message' => 'Profil mis à jour',
            'id' => method_exists($user, 'getId') ? $user->getId() : null,
            'firstName' => method_exists($user, 'getFirstName') ? $user->getFirstName() : null,
            'lastName' => method_exists($user, 'getLastName') ? $user->getLastName() : null,
            'email' => method_exists($user, 'getEmail') ? $user->getEmail() : null,
            'heightCm' => $user->getHeightCm(),
            'weightKg' => $user->getWeightKg(),
            'age' => $user->getAge(),
            'profileImageUrl' => method_exists($user, 'getProfileImageDataUrl') ? $user->getProfileImageDataUrl() : null,
            'total_xp' => method_exists($user, 'getTotalXp') ? $user->getTotalXp() : 0, // ✅ Ajouté ici pour garder l'app à jour
        ]);
    }

    // ✅ Upload de la photo de profil depuis l'app mobile (JWT, sans CSRF
    // puisque /api/* est stateless — équivalent de la route web /profil/photo
    // qui, elle, repose sur la session + CSRF et n'est pas accessible au mobile).
    #[Route('/api/profile/photo', name: 'api_profile_photo_upload', methods: ['POST'])]
    public function uploadPhoto(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $user = $this->getUser();

        if (!$user instanceof User) {
            return $this->json(['message' => 'Utilisateur non authentifié'], 401);
        }

        $file = $request->files->get('image');

        if (!$file) {
            return $this->json(['message' => 'Aucune image reçue'], 400);
        }

        $binary = file_get_contents($file->getPathname());
        $mime = $file->getMimeType();

        $user->setProfileImage($binary);
        $user->setProfileImageMime($mime);
        $user->setProfileImageUpdatedAt(new \DateTimeImmutable());
        $em->flush();

        return $this->json([
            'profileImageUrl' => $user->getProfileImageDataUrl(),
        ]);
    }

    // ✅ NOUVELLE ROUTE DÉDIÉE À LA MISE À JOUR DE L'XP
    #[Route('/api/profile/xp', name: 'api_profile_xp_update', methods: ['PUT', 'PATCH'])]
    public function updateXp(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $user = $this->getUser();

        if (!$user instanceof User) {
            return $this->json(['message' => 'Utilisateur non authentifié'], 401);
        }

        $payload = json_decode($request->getContent(), true);

        if (!is_array($payload) || !isset($payload['total_xp'])) {
            return $this->json(['message' => 'Payload JSON invalide ou total_xp manquant'], 400);
        }

        // On s'assure que c'est bien un entier
        $newTotalXp = (int) $payload['total_xp'];

        // Sécurité basique : on ne peut pas avoir un XP négatif
        if ($newTotalXp < 0) {
            return $this->json(['message' => 'L\'XP ne peut pas être négatif'], 422);
        }

        // Mise à jour de l'utilisateur
        if (method_exists($user, 'setTotalXp')) {
            $user->setTotalXp($newTotalXp);
        }

        $em->flush();

        return $this->json([
            'message' => 'XP mis à jour avec succès',
            'total_xp' => $user->getTotalXp()
        ], 200); // Code 200 OK
    }
}
