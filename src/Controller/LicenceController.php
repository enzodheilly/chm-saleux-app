<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\LicenceRepository;
use App\Service\SystemLoggerService; // ✅ Import
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class LicenceController extends AbstractController
{
    #[Route('/licence/add', name: 'add_licence', methods: ['POST'])]
    public function add(
        Request $request,
        LicenceRepository $licenceRepo,
        EntityManagerInterface $em,
        SystemLoggerService $logger // ✅ Injection
    ): JsonResponse {
        /** @var User $user */
        $user = $this->getUser();

        if (!$user) {
            return new JsonResponse(['success' => false, 'message' => 'Utilisateur non authentifié.'], 401);
        }

        $licenceNumber = $request->request->get('licence_number');

        if (!$licenceNumber) {
            return new JsonResponse(['success' => false, 'message' => 'Veuillez entrer un numéro de licence.']);
        }

        $licence = $licenceRepo->findOneBy(['number' => $licenceNumber]);

        if (!$licence) {
            // Log tentative échouée (optionnel, utile pour détecter les tentatives de force brute)
            $logger->add('Licence', sprintf('Tentative d\'ajout de licence invalide (%s) par %s', $licenceNumber, $user->getEmail()));

            return new JsonResponse(['success' => false, 'message' => 'Licence invalide.']);
        }

        if ($licence->isAlreadyAssociated() || $licence->getUser()) {
            return new JsonResponse(['success' => false, 'message' => 'Cette licence est déjà utilisée.']);
        }

        $licence->setUser($user);
        $licence->setAlreadyAssociated(true);

        $user->setLicenceNumber($licence->getNumber());
        $user->setFirstName($licence->getFirstName());
        $user->setLastName($licence->getLastName());
        $user->setLicenceStatus('Active');
        $user->setLicenceEndDate($licence->getExpiryDate());
        $user->setLicenceType($licence->getType());

        $em->persist($licence);
        $em->persist($user);
        $em->flush();

        // ✅ LOG : Ajout réussi
        $logger->add('Licence', sprintf('Licence %s associée au compte %s (%s %s)', $licenceNumber, $user->getEmail(), $licence->getFirstName(), $licence->getLastName()));

        return new JsonResponse([
            'success' => true,
            'message' => 'Licence ajoutée avec succès !'
        ]);
    }

    #[Route('/licence/delete', name: 'delete_licence', methods: ['POST'])]
    public function delete(
        Request $request,
        LicenceRepository $licenceRepo,
        EntityManagerInterface $em,
        SystemLoggerService $logger // ✅ Injection
    ): JsonResponse {
        /** @var User $user */
        $user = $this->getUser();

        if (!$user) {
            return new JsonResponse(['success' => false, 'message' => 'Utilisateur non authentifié.'], 401);
        }

        $licenceNumber = $request->request->get('licence_number');

        $licence = $licenceRepo->findOneBy(['number' => $licenceNumber, 'user' => $user]);

        if (!$licence) {
            return new JsonResponse(['success' => false, 'message' => 'Licence non trouvée pour cet utilisateur.']);
        }

        // Dissociation
        $licence->setUser(null);
        $licence->setAlreadyAssociated(false);

        $user->setLicenceNumber(null);
        $user->setFirstName(null);
        $user->setLastName(null);
        $user->setLicenceStatus('Inactive');
        $user->setLicenceEndDate(null);
        $user->setLicenceType(null);

        $em->persist($licence);
        $em->persist($user);
        $em->flush();

        // ✅ LOG : Suppression
        $logger->add('Licence', sprintf('Licence %s dissociée du compte %s', $licenceNumber, $user->getEmail()));

        return new JsonResponse([
            'success' => true,
            'message' => 'Licence dissociée avec succès.'
        ]);
    }
}
