<?php

namespace App\Controller\Admin;

use App\Entity\Result;
use App\Entity\Competition;
use App\Entity\Athlete;
use App\Form\CompetitionType;
use App\Repository\CompetitionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;

#[Route('/admin/competitions')]
class CompetitionAdminController extends AbstractController
{
    /**
     * Liste globale (Résultats + Agenda)
     */
    #[Route('/', name: 'admin_competition_index')]
    public function index(CompetitionRepository $repo): Response
    {
        $competitions = $repo->findBy([], ['date' => 'DESC']);

        return $this->render('admin/competitions/list.html.twig', [
            'competitions' => $competitions,
        ]);
    }

    /**
     * Route spécifique pour la création
     */
    #[Route('/new', name: 'admin_competition_new', methods: ['POST', 'GET'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        // --- TRAITEMENT DU FORMULAIRE (POST) ---
        if ($request->isMethod('POST')) {
            $data = $request->request->all();
            /** @var UploadedFile $file */
            $file = $request->files->get('image');

            $competition = new Competition();
            $competition->setTitre($data['titre']);
            $competition->setDate(new \DateTime($data['date']));
            $competition->setLieu($data['lieu']);
            $competition->setType($data['type'] ?? null);
            $competition->setEquipe($data['equipe'] ?? null);
            $competition->setClassementEquipe($data['classementEquipe'] ?? null);

            if ($file) {
                $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = transliterator_transliterate(
                    'Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()',
                    $originalFilename
                );
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $file->guessExtension();

                $uploadDir = $this->getParameter('upload_dir') . '/competitions';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0775, true);
                }

                try {
                    $file->move($uploadDir, $newFilename);
                    $competition->setImage($newFilename);
                } catch (\Exception $e) {
                    $this->addFlash('error', 'Impossible de téléverser l’image : ' . $e->getMessage());
                    return $this->redirectToRoute('admin_competition_new');
                }
            }

            if (isset($data['results']) && is_array($data['results'])) {
                foreach ($data['results'] as $resultData) {
                    if (!empty($resultData['nom'])) {
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
            }

            $em->persist($competition);
            $em->flush();

            $this->addFlash('success', 'Événement/Compétition enregistré avec succès.');
            return $this->redirectToRoute('admin_competition_index');
        }

        // --- AFFICHAGE DU FORMULAIRE (GET) ---

        // 1. Récupération des athlètes
        $athletes = $em->getRepository(Athlete::class)->findAll();

        // 2. Préparation des données pour le JS
        $athletesData = [];
        foreach ($athletes as $athlete) {
            $athletesData[] = [
                'id' => $athlete->getId(),
                'nom' => $athlete->getNom(),
                'prenom' => $athlete->getPrenom(),
                'equipe' => $athlete->getEquipe(),
                // --- AJOUT ICI : On récupère la catégorie de poids ---
                'categoriePoids' => $athlete->getCategoriePoids() ?? '',
            ];
        }

        return $this->render('admin/competitions/new.html.twig', [
            'title' => 'Nouvelle compétition ou date d\'agenda',
            'athletesJson' => json_encode($athletesData),
        ]);
    }

    #[Route('/edit/{id}', name: 'admin_competition_edit')]
    public function edit(Competition $competition, Request $request, EntityManagerInterface $em): Response
    {
        // Si c'est une soumission de formulaire (POST)
        if ($request->isMethod('POST')) {
            $data = $request->request->all();
            /** @var UploadedFile $file */
            $file = $request->files->get('image');

            // Mise à jour des infos principales
            $competition->setTitre($data['titre']);
            $competition->setDate(new \DateTime($data['date']));
            $competition->setLieu($data['lieu']);
            $competition->setType($data['type'] ?? null);
            $competition->setEquipe($data['equipe'] ?? null);
            $competition->setClassementEquipe($data['classementEquipe'] ?? null);

            // Gestion de l'image (si nouvelle image)
            if ($file) {
                // ... (Même logique d'upload que 'new') ...
                $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $file->guessExtension();
                try {
                    $file->move($this->getParameter('upload_dir') . '/competitions', $newFilename);
                    $competition->setImage($newFilename);
                } catch (\Exception $e) { /* Gérer erreur */
                }
            }

            // --- GESTION INTELLIGENTE DES RÉSULTATS ---
            // 1. On supprime les anciens résultats pour éviter les doublons/conflits
            // (Ou on pourrait faire un update plus fin, mais delete/recreate est plus simple ici)
            foreach ($competition->getResults() as $oldResult) {
                $em->remove($oldResult);
            }

            // 2. On recrée les nouveaux
            if (isset($data['results']) && is_array($data['results'])) {
                foreach ($data['results'] as $resultData) {
                    if (!empty($resultData['nom'])) {
                        $result = new Result();
                        $result->setNom($resultData['nom']);
                        $result->setPrenom($resultData['prenom'] ?? '');
                        $result->setCategorie($resultData['categorie'] ?? null);
                        $result->setCategoriePoids($resultData['categoriePoids'] ?? null);
                        $result->setArracher((float) ($resultData['arracher'] ?? 0));
                        $result->setEpauleJete((float) ($resultData['epauleJete'] ?? 0));
                        $result->setTotal((float) ($resultData['total'] ?? 0));
                        $result->setPoint((int) ($resultData['point'] ?? 0));
                        // ... autres champs ...

                        $result->setCompetition($competition);
                        $em->persist($result);
                    }
                }
            }

            $em->flush();
            $this->addFlash('success', 'Compétition mise à jour.');
            return $this->redirectToRoute('admin_competition_index');
        }

        // --- AFFICHAGE (GET) ---
        $athletes = $em->getRepository(Athlete::class)->findAll();
        $athletesData = [];
        foreach ($athletes as $athlete) {
            $athletesData[] = [
                'id' => $athlete->getId(),
                'nom' => $athlete->getNom(),
                'prenom' => $athlete->getPrenom(),
                'equipe' => $athlete->getEquipe(),
                'categoriePoids' => $athlete->getCategoriePoids() ?? '',
            ];
        }

        return $this->render('admin/competitions/edit.html.twig', [
            'competition' => $competition,
            'athletesJson' => json_encode($athletesData),
        ]);
    }

    #[Route('/delete/{id}', name: 'admin_competition_delete', methods: ['POST'])]
    public function delete(Request $request, Competition $competition, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete' . $competition->getId(), $request->request->get('_token'))) {
            $em->remove($competition);
            $em->flush();
            $this->addFlash('success', 'Compétition supprimée.');
        }

        return $this->redirectToRoute('admin_competition_index');
    }
}
