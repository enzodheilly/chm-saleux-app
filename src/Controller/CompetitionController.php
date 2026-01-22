<?php

namespace App\Controller;

use App\Entity\Athlete;
use App\Entity\Competition;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompetitionController extends AbstractController
{
    #[Route('/competition', name: 'competition')]
    public function index(EntityManagerInterface $em): Response
    {
        $competitions = $em->getRepository(Competition::class)->findAll();

        $femaleCompetitions = [];
        $maleCompetitions = [];

        foreach ($competitions as $comp) {
            $compData = [
                'id' => $comp->getId(),
                'titre' => $comp->getTitre(),
                'type' => $comp->getType(),
                'date' => $comp->getDate()->format('d/m/Y'),
                'lieu' => $comp->getLieu(),
                'image' => $comp->getImage() ? '/uploads/competitions/' . $comp->getImage() : null,
                'classementEquipe' => $comp->getClassementEquipe() ?? null,
                'resultats' => array_map(fn($r) => [
                    'nom' => $r->getNom(),
                    'prenom' => $r->getPrenom(),
                    'categorie' => $r->getCategorie(),
                    'categoriePoids' => $r->getCategoriePoids(),
                    'epauleJete' => $r->getEpauleJete(),
                    'arracher' => $r->getArracher(),
                    'total' => $r->getTotal(),
                    'point' => $r->getPoint(),
                    'pdc' => $r->getPdc(),
                    'classee' => $r->getClassee(),
                ], $comp->getResults()->toArray())
            ];

            if ($comp->getEquipe() === 'female') {
                $femaleCompetitions[] = $compData;
            } elseif ($comp->getEquipe() === 'male') {
                $maleCompetitions[] = $compData;
            }
        }

        return $this->render('competitions/index.html.twig', [
            'competitions' => $competitions,
            'femaleCompetitions' => $femaleCompetitions,
            'maleCompetitions' => $maleCompetitions,
        ]);
    }

    #[Route('/competition/feminine', name: 'competitions_feminine')]
    public function feminine(EntityManagerInterface $em): Response
    {
        $competitions = $em->getRepository(Competition::class)
            ->findBy(['equipe' => 'female'], ['date' => 'DESC']);

        $athletes = $em->getRepository(Athlete::class)
            ->findBy(['equipe' => 'female']);

        // Tri par catégorie ou points total si nécessaire
        $classement = $athletes;

        return $this->render('competitions/feminine.html.twig', [
            'competitions' => $competitions,
            'athletes' => $athletes,
            'classement' => $classement,
        ]);
    }

    #[Route('/competition/masculine', name: 'competitions_masculine')]
    public function masculine(EntityManagerInterface $em): Response
    {
        $competitions = $em->getRepository(Competition::class)
            ->findBy(['equipe' => 'male'], ['date' => 'DESC']);

        $athletes = $em->getRepository(Athlete::class)
            ->findBy(['equipe' => 'male']);

        $classement = $athletes;

        return $this->render('competitions/masculine.html.twig', [
            'competitions' => $competitions,
            'athletes' => $athletes,
            'classement' => $classement,
        ]);
    }

    #[Route('/athlete/{id}', name: 'athlete_show')]
    public function showAthlete(Athlete $athlete): Response
    {
        return $this->render('competitions/show.html.twig', [
            'athlete' => $athlete,
        ]);
    }
}
