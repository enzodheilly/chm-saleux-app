<?php

namespace App\Controller\Front;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class ProfileController extends AbstractController
{
    #[Route('/profil/photo', name: 'profile_photo', methods: ['POST'])]
    public function uploadProfilePhoto(Request $request, EntityManagerInterface $em): Response
    {
        $user = $this->getUser();

        if (!$user instanceof User) {
            throw $this->createAccessDeniedException('Vous devez être connecté pour uploader une photo.');
        }

        $file = $request->files->get('profileImage');

        if ($file) {
            // Vérifications basiques
            $allowedMimeTypes = ['image/jpeg', 'image/png'];
            if (!in_array($file->getMimeType(), $allowedMimeTypes)) {
                $this->addFlash('error', 'Format de fichier non autorisé (JPEG/PNG uniquement).');
                return $this->redirectToRoute('dashboard');
            }

            // Limite taille 2Mo
            if ($file->getSize() > 2 * 1024 * 1024) {
                $this->addFlash('error', 'Fichier trop volumineux (max 2 Mo).');
                return $this->redirectToRoute('dashboard');
            }

            try {
                $binary = file_get_contents($file->getPathname());
                $user->setProfileImage($binary);
                $user->setProfileImageMime($file->getMimeType());
                $user->setProfileImageUpdatedAt(new \DateTimeImmutable());

                $em->flush();
                $this->addFlash('success', 'Photo de profil mise à jour !');
            } catch (FileException $e) {
                $this->addFlash('error', 'Erreur lors de l’upload : ' . $e->getMessage());
            }
        } else {
            $this->addFlash('error', 'Aucun fichier sélectionné.');
        }

        return $this->redirectToRoute('dashboard');
    }
}
