<?php

namespace App\Controller\Front;

use App\Entity\Athlete;
use App\Entity\Competition;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompetitionController extends AbstractController
{
    /**
     * Affiche la page complète (Header + Calendrier + Liste Équipes)
     */
    #[Route('/competition/{year}/{month}', name: 'competition', defaults: ['year' => null, 'month' => null])]
    public function index(EntityManagerInterface $em, ?int $year, ?int $month): Response
    {
        // On récupère toutes les données via la méthode privée
        $data = $this->getCalendarData($em, $year, $month);

        return $this->render('competitions/index.html.twig', $data);
    }

    /**
     * NOUVELLE ROUTE : Appelée par le JavaScript pour mettre à jour UNIQUEMENT le calendrier
     */
    #[Route('/ajax/competition/{year}/{month}', name: 'ajax_competition')]
    public function ajaxCalendar(EntityManagerInterface $em, int $year, int $month): Response
    {
        $data = $this->getCalendarData($em, $year, $month);

        // On rend uniquement le template partiel de la grille
        return $this->render('competitions/_calendar_grid.html.twig', $data);
    }

    /**
     * Méthode privée pour centraliser la logique (DRY - Don't Repeat Yourself)
     */
    private function getCalendarData(EntityManagerInterface $em, ?int $year, ?int $month): array
    {
        // 1. Gestion de la date
        $now = new \DateTime();
        $year = $year ?? (int)$now->format('Y');
        $month = $month ?? (int)$now->format('m');

        $currentMonthDate = new \DateTime("$year-$month-01");

        // 2. Calcul des mois Précédent / Suivant
        $prevMonth = (clone $currentMonthDate)->modify('-1 month');
        $nextMonth = (clone $currentMonthDate)->modify('+1 month');

        // 3. Infos pour la grille
        $daysInMonth = (int)$currentMonthDate->format('t');
        $startDayOfWeek = (int)$currentMonthDate->format('N'); // 1 (Lun) à 7 (Dim)

        // 4. Récupération des données
        $competitions = $em->getRepository(Competition::class)->findAll();

        $femaleCompetitions = [];
        $maleCompetitions = [];
        $eventsByDate = [];

        foreach ($competitions as $comp) {
            $formattedDate = $comp->getDate()->format('Y-m-d');

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

            // On remplit le tableau indexé par date pour le calendrier
            $eventsByDate[$formattedDate] = $compData;

            if ($comp->getEquipe() === 'female') {
                $femaleCompetitions[] = $compData;
            } elseif ($comp->getEquipe() === 'male') {
                $maleCompetitions[] = $compData;
            }
        }

        return [
            'competitions' => $competitions,
            'femaleCompetitions' => $femaleCompetitions,
            'maleCompetitions' => $maleCompetitions,
            'eventsByDate' => $eventsByDate,
            // Variables de navigation temporelle
            'currentMonthName' => $currentMonthDate,
            'daysInMonth' => $daysInMonth,
            'startDay' => $startDayOfWeek,
            'currentYear' => $year,
            'currentMonth' => $month,
            'prevParams' => ['year' => $prevMonth->format('Y'), 'month' => $prevMonth->format('m')],
            'nextParams' => ['year' => $nextMonth->format('Y'), 'month' => $nextMonth->format('m')],
        ];
    }

    #[Route('/competition/feminine', name: 'competitions_feminine')]
    public function feminine(EntityManagerInterface $em): Response
    {
        $competitions = $em->getRepository(Competition::class)
            ->findBy(['equipe' => 'female'], ['date' => 'DESC']);

        $athletes = $em->getRepository(Athlete::class)
            ->findBy(['equipe' => 'female']);

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
