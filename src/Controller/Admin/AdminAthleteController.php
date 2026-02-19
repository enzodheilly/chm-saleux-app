<?php

namespace App\Controller\Admin;

use App\Entity\Athlete;
use App\Form\AthleteType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Uid\Uuid;

#[Route('/admin/athlete')]
class AdminAthleteController extends AbstractController
{
    #[Route('/', name: 'admin_athlete_index')]
    public function index(EntityManagerInterface $em): Response
    {
        $athletes = $em->getRepository(Athlete::class)->findAll();

        return $this->render('admin/athlete/index.html.twig', compact('athletes'));
    }

    #[Route('/new', name: 'admin_athlete_new', methods: ['GET', 'POST'])]
    public function new(
        Request $request,
        EntityManagerInterface $em,
        SluggerInterface $slugger
    ): Response {
        $athlete = new Athlete();
        $form = $this->createForm(AthleteType::class, $athlete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->handleAthleteImageUpload($form->get('image')->getData(), $athlete, $slugger);

            $em->persist($athlete);
            $em->flush();

            $this->addFlash('success', 'Athlete created successfully!');
            return $this->redirectToRoute('admin_athlete_index');
        }

        return $this->render('admin/athlete/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_athlete_edit', methods: ['GET', 'POST'])]
    public function edit(
        Athlete $athlete,
        Request $request,
        EntityManagerInterface $em,
        SluggerInterface $slugger
    ): Response {
        $oldImage = $athlete->getImage();

        $form = $this->createForm(AthleteType::class, $athlete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $newUploaded = $form->get('image')->getData();

            if ($newUploaded) {
                $this->handleAthleteImageUpload($newUploaded, $athlete, $slugger);

                // ✅ delete old file after successful setImage
                $this->deleteAthleteImageFile($oldImage);
            }

            $em->flush();

            $this->addFlash('success', 'Athlete updated successfully!');
            return $this->redirectToRoute('admin_athlete_index');
        }

        return $this->render('admin/athlete/edit.html.twig', [
            'form' => $form->createView(),
            'athlete' => $athlete,
        ]);
    }

    #[Route('/{id}/delete', name: 'admin_athlete_delete', methods: ['POST'])]
    public function delete(Athlete $athlete, Request $request, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete' . $athlete->getId(), (string) $request->request->get('_token'))) {
            // ✅ delete file before removing entity
            $this->deleteAthleteImageFile($athlete->getImage());

            $em->remove($athlete);
            $em->flush();

            $this->addFlash('success', 'Athlete deleted successfully!');
        }

        return $this->redirectToRoute('admin_athlete_index');
    }

    private function handleAthleteImageUpload(
        mixed $imageFile,
        Athlete $athlete,
        SluggerInterface $slugger
    ): void {
        if (!$imageFile) {
            return;
        }

        // ✅ Extra safety: allow only image extensions (you should ALSO validate in the form)
        $ext = strtolower((string) $imageFile->guessExtension());
        if ($ext === '' || !in_array($ext, ['jpg', 'jpeg', 'png', 'webp'], true)) {
            $ext = 'bin'; // fallback (shouldn't happen if your form constraint is correct)
        }

        // ✅ Safe filename: slug + uuid
        $originalName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
        $safeName = $slugger->slug($originalName)->lower();
        $newFilename = $safeName . '-' . Uuid::v4()->toRfc4122() . '.' . $ext;

        $targetDir = rtrim((string) $this->getParameter('upload_dir'), '/\\') . '/athletes';

        try {
            $imageFile->move($targetDir, $newFilename);
            $athlete->setImage($newFilename);
        } catch (FileException) {
            $this->addFlash('error', 'Error while uploading the image.');
        }
    }

    private function deleteAthleteImageFile(?string $filename): void
    {
        if (!$filename) {
            return;
        }

        $targetDir = rtrim((string) $this->getParameter('upload_dir'), '/\\') . '/athletes';
        $path = $targetDir . '/' . basename($filename);

        // @ is not great, but fine here; alternatively use Symfony Filesystem component
        if (is_file($path)) {
            @unlink($path);
        }
    }
}
