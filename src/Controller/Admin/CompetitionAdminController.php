<?php

namespace App\Controller\Admin;

use App\Entity\Result;
use App\Entity\Competition;
use App\Form\CompetitionType;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;

#[Route('/admin/competitions')]
class CompetitionAdminController extends AbstractController
{
    #[Route('/', name: 'admin_competition_index')]
    public function index(EntityManagerInterface $em): Response
    {
        $competitions = $em->getRepository(Competition::class)->findAll();

        return $this->render('admin/competitions/list.html.twig', [
            'competitions' => $competitions,
        ]);
    }

    #[Route('/new', name: 'admin_competition_new', methods: ['POST', 'GET'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        if ($request->isMethod('POST')) {
            $data = $request->request->all();
            /** @var UploadedFile $file */
            $file = $request->files->get('image');

            // Création de la compétition
            $competition = new Competition();
            $competition->setTitre($data['titre']);
            $competition->setDate(new \DateTime($data['date']));
            $competition->setLieu($data['lieu']);
            $competition->setType($data['type'] ?? null);
            $competition->setEquipe($data['equipe'] ?? null);
            $competition->setClassementEquipe($data['classementEquipe'] ?? null);

            // --- Gestion de l'image ---
            if ($file) {
                // Génération d’un nom unique
                $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = transliterator_transliterate(
                    'Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()',
                    $originalFilename
                );
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $file->guessExtension();

                // Dossier upload/competitions
                $uploadDir = $this->getParameter('upload_dir') . '/competitions';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0775, true);
                }

                // Déplacement du fichier
                try {
                    $file->move($uploadDir, $newFilename);
                    $competition->setImage($newFilename);
                } catch (\Exception $e) {
                    $this->addFlash('error', 'Impossible de téléverser l’image : ' . $e->getMessage());
                    return $this->redirectToRoute('admin_competition_new');
                }
            }

            // --- Enregistrement des résultats ---
            if (isset($data['results']) && is_array($data['results'])) {
                foreach ($data['results'] as $resultData) {
                    $result = new Result();
                    $result->setNom($resultData['nom'] ?? '');
                    $result->setPrenom($resultData['prenom'] ?? '');
                    $result->setCategorie($resultData['categorie'] ?? null);
                    $result->setCategoriePoids($resultData['categoriePoids'] ?? null);
                    $result->setArracher((float) ($resultData['arracher'] ?? 0));
                    $result->setEpauleJete((float) ($resultData['epauleJete'] ?? 0));
                    $result->setTotal((float) ($resultData['total'] ?? 0));
                    $result->setPoint((int) ($resultData['point'] ?? 0));
                    $result->setPdc((float) ($resultData['pdc'] ?? 0));
                    $result->setClassee($resultData['classee'] ?? null);

                    $result->setCompetition($competition);
                    $em->persist($result);
                }
            }

            $em->persist($competition);
            $em->flush();

            $this->addFlash('success', 'Compétition enregistrée avec succès.');
            return $this->redirectToRoute('admin_competition_index');
        }

        return $this->render('admin/competitions/new.html.twig', [
            'title' => 'Nouvelle compétition',
        ]);
    }
    #[Route('/edit/{id}', name: 'admin_competition_edit')]
    public function edit(Competition $competition, Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(CompetitionType::class, $competition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /** @var UploadedFile $imageFile */
            $imageFile = $form->get('image')->getData();
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = transliterator_transliterate(
                    'Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()',
                    $originalFilename
                );
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();

                $uploadDir = $this->getParameter('upload_dir') . '/competitions';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0775, true);
                }

                try {
                    $imageFile->move($uploadDir, $newFilename);
                    $competition->setImage($newFilename);
                } catch (\Exception $e) {
                    $this->addFlash('error', 'Impossible de téléverser l’image : ' . $e->getMessage());
                    return $this->redirectToRoute('admin_competition_edit', ['id' => $competition->getId()]);
                }
            }

            $em->flush();

            $this->addFlash('success', 'Compétition modifiée.');
            return $this->redirectToRoute('admin_competition_index');
        }

        return $this->render('admin/competitions/form.html.twig', [
            'form' => $form->createView(),
            'title' => "Modifier la compétition",
        ]);
    }

    #[Route('/delete/{id}', name: 'admin_competition_delete')]
    public function delete(Competition $competition, EntityManagerInterface $em): Response
    {
        $em->remove($competition);
        $em->flush();

        $this->addFlash('success', 'Compétition supprimée.');
        return $this->redirectToRoute('admin_competition_index');
    }
}
