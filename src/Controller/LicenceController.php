<?php

// src/Controller/LicenceController.php
namespace App\Controller;

use App\Entity\User;
use App\Repository\LicenceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class LicenceController extends AbstractController
{
    #[Route('/licence/add', name: 'add_licence', methods: ['POST'])]
    public function add(Request $request, LicenceRepository $licenceRepo, EntityManagerInterface $em): JsonResponse
    {
        $user = $this->getUser();

        if (!$user) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Utilisateur non authentifié.'
            ], 401);
        }

        $licenceNumber = $request->request->get('licence_number');

        if (!$licenceNumber) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Veuillez entrer un numéro de licence.'
            ]);
        }

        $licence = $licenceRepo->findOneBy(['number' => $licenceNumber]);

        if (!$licence) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Licence invalide.'
            ]);
        }

        if ($licence->isAlreadyAssociated() || $licence->getUser()) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Cette licence est déjà utilisée.'
            ]);
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

        return new JsonResponse([
            'success' => true,
            'message' => 'Licence ajoutée avec succès !'
        ]);
    }

    #[Route('/licence/delete', name: 'delete_licence', methods: ['POST'])]
    public function delete(Request $request, LicenceRepository $licenceRepo, EntityManagerInterface $em): JsonResponse
    {
        $user = $this->getUser();

        if (!$user) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Utilisateur non authentifié.'
            ], 401);
        }

        $licenceNumber = $request->request->get('licence_number');

        if (!$licenceNumber) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Numéro de licence manquant.'
            ]);
        }

        $licence = $licenceRepo->findOneBy(['number' => $licenceNumber, 'user' => $user]);

        if (!$licence) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Licence non trouvée pour cet utilisateur.'
            ]);
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

        return new JsonResponse([
            'success' => true,
            'message' => 'Licence dissociée avec succès.'
        ]);
    }
}
