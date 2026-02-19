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
    #[Route('/competition', name: 'competition_root')]
    #[Route(
        '/competition/{year}/{month}',
        name: 'competition',
        defaults: ['year' => null, 'month' => null],
        requirements: ['year' => '\d{4}', 'month' => '\d{1,2}']
    )]
    public function index(EntityManagerInterface $em, ?string $year = null, ?string $month = null): Response
    {
        $yearInt = $year !== null ? (int) $year : null;
        $monthInt = $month !== null ? (int) $month : null;

        $data = $this->getCalendarData($em, $yearInt, $monthInt);

        return $this->render('competitions/index.html.twig', $data);
    }

    #[Route(
        '/ajax/competition/{year}/{month}',
        name: 'ajax_competition',
        requirements: ['year' => '\d{4}', 'month' => '\d{1,2}']
    )]
    public function ajaxCalendar(EntityManagerInterface $em, string $year, string $month): Response
    {
        $data = $this->getCalendarData($em, (int) $year, (int) $month);

        return $this->render('competitions/_calendar_grid.html.twig', $data);
    }

    private function getCalendarData(EntityManagerInterface $em, ?int $year, ?int $month): array
    {
        $now = new \DateTimeImmutable();
        $year = $year ?? (int) $now->format('Y');
        $month = $month ?? (int) $now->format('m');

        $month = max(1, min(12, $month));

        $currentMonthDate = new \DateTimeImmutable(sprintf('%04d-%02d-01', $year, $month));

        $prevMonth = $currentMonthDate->modify('-1 month');
        $nextMonth = $currentMonthDate->modify('+1 month');

        $daysInMonth = (int) $currentMonthDate->format('t');
        $startDayOfWeek = (int) $currentMonthDate->format('N'); // 1..7

        // ✅ Perf: tu peux remplacer par une requête filtrée sur le mois,
        // mais je garde ton findAll pour l’instant.
        $competitions = $em->getRepository(Competition::class)->findAll();

        $femaleCompetitions = [];
        $maleCompetitions = [];
        $eventsByDate = [];

        foreach ($competitions as $comp) {
            $eventDate = $comp->getEventDate();
            if (!$eventDate) {
                continue;
            }

            $formattedDate = $eventDate->format('Y-m-d');

            $compData = [
                'id' => $comp->getId(),
                'title' => $comp->getTitle(),
                'type' => $comp->getCompetitionType(),
                'date' => $eventDate->format('d/m/Y'),
                'location' => $comp->getLocation(),
                'image' => $comp->getImage() ? '/uploads/competitions/' . $comp->getImage() : null,
                'teamRanking' => $comp->getTeamRanking(),
                'results' => array_map(static fn($r) => [
                    'lastName' => $r->getLastName(),
                    'firstName' => $r->getFirstName(),
                    'category' => $r->getCategory(),
                    'weightClass' => $r->getWeightClass(),
                    'cleanAndJerk' => $r->getCleanAndJerk(),
                    'snatch' => $r->getSnatch(),
                    'total' => $r->getTotal(),
                    'points' => $r->getPoints(),
                    'bodyWeight' => $r->getBodyWeight(),
                    'rankingLevel' => $r->getRankingLevel(),
                ], $comp->getResults()->toArray()),
            ];

            // ✅ support multiple competitions same day
            $eventsByDate[$formattedDate][] = $compData;

            if ($comp->getGender() === 'female') {
                $femaleCompetitions[] = $compData;
            } elseif ($comp->getGender() === 'male') {
                $maleCompetitions[] = $compData;
            }
        }

        return [
            'competitions' => $competitions,
            'femaleCompetitions' => $femaleCompetitions,
            'maleCompetitions' => $maleCompetitions,
            'eventsByDate' => $eventsByDate,

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
            ->findBy(['gender' => 'female'], ['eventDate' => 'DESC']);

        $athletes = $em->getRepository(Athlete::class)
            ->findBy(['gender' => 'female']);

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
            ->findBy(['gender' => 'male'], ['eventDate' => 'DESC']);

        $athletes = $em->getRepository(Athlete::class)
            ->findBy(['gender' => 'male']);

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
