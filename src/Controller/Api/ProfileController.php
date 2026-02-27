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
        $phone     = array_key_exists('phone', $payload) ? trim((string) ($payload['phone'] ?? '')) : null;

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

        if ($phone !== null) {
            // Optionnel : normalisation légère
            $phone = $phone === '' ? null : $phone;

            if ($phone !== null && mb_strlen($phone) < 6) {
                return $this->json(['message' => 'Téléphone invalide'], 422);
            }

            if (method_exists($user, 'setPhone')) {
                $user->setPhone($phone);
            }
        }

        $em->flush();

        return $this->json([
            'message' => 'Profil mis à jour',
            'id' => method_exists($user, 'getId') ? $user->getId() : null,
            'firstName' => method_exists($user, 'getFirstName') ? $user->getFirstName() : null,
            'lastName' => method_exists($user, 'getLastName') ? $user->getLastName() : null,
            'email' => method_exists($user, 'getEmail') ? $user->getEmail() : null,
            'phone' => method_exists($user, 'getPhone') ? $user->getPhone() : null,
            'profileImageUrl' => method_exists($user, 'getProfileImageDataUrl') ? $user->getProfileImageDataUrl() : null,
            'total_xp' => method_exists($user, 'getTotalXp') ? $user->getTotalXp() : 0, // ✅ Ajouté ici pour garder l'app à jour
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
