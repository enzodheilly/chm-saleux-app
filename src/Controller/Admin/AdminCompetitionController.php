<?php
// src/Controller/Admin/AdminCompetitionController.php

namespace App\Controller\Admin;

use App\Entity\Competition;
use App\Entity\CompetitionResult;
use App\Entity\Athlete;
use App\Repository\CompetitionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/competitions')]
class AdminCompetitionController extends AbstractController
{
    #[Route('/', name: 'admin_competition_index')]
    public function index(CompetitionRepository $repo): Response
    {
        $competitions = $repo->findBy([], ['eventDate' => 'DESC']);

        return $this->render('admin/competitions/list.html.twig', [
            'competitions' => $competitions,
        ]);
    }

    #[Route('/new', name: 'admin_competition_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        if ($request->isMethod('POST')) {
            $data = $request->request->all();
            /** @var UploadedFile|null $file */
            $file = $request->files->get('image');

            $competition = new Competition();

            $competition->setTitle((string) ($data['title'] ?? ''));
            $competition->setCompetitionType($this->nullify($data['competitionType'] ?? null));
            $competition->setLocation((string) ($data['location'] ?? ''));

            $gender = $data['gender'] ?? null;
            $competition->setGender($gender === '' ? null : $gender);

            $competition->setTeamRanking($this->nullify($data['teamRanking'] ?? null));

            try {
                $eventDate = new \DateTimeImmutable((string) ($data['eventDate'] ?? ''));
                $competition->setEventDate($eventDate);
            } catch (\Throwable $e) {
                $this->addFlash('error', 'Invalid event date.');
                return $this->redirectToRoute('admin_competition_new');
            }

            if ($file instanceof UploadedFile) {
                $newFilename = $this->uploadCompetitionImage($file);
                if ($newFilename === null) {
                    $this->addFlash('error', 'Image upload failed (invalid file or server error).');
                    return $this->redirectToRoute('admin_competition_new');
                }
                $competition->setImage($newFilename);
            }

            $results = $data['results'] ?? [];
            if (is_array($results)) {
                foreach ($results as $row) {
                    if (!is_array($row)) continue;

                    $lastName = $this->nullify($row['lastName'] ?? null);
                    $firstName = $this->nullify($row['firstName'] ?? null);

                    if ($lastName === null && $firstName === null) continue;

                    $result = new CompetitionResult();
                    $result->setLastName($lastName ?? '');
                    $result->setFirstName($firstName ?? '');

                    $result->setCategory($this->nullify($row['category'] ?? null));
                    $result->setWeightClass($this->nullify($row['weightClass'] ?? null));

                    $result->setSnatch((float) ($row['snatch'] ?? 0));
                    $result->setCleanAndJerk((float) ($row['cleanAndJerk'] ?? 0));

                    $points = $row['points'] ?? null;
                    $result->setPoints($points === '' || $points === null ? null : (float) $points);

                    $bw = $row['bodyWeight'] ?? null;
                    $result->setBodyWeight($bw === '' || $bw === null ? null : (float) $bw);

                    $result->setRankingLevel($this->nullify($row['rankingLevel'] ?? null));

                    $result->setCompetition($competition);
                    $em->persist($result);
                }
            }

            $em->persist($competition);
            $em->flush();

            $this->addFlash('success', 'Competition saved successfully.');
            return $this->redirectToRoute('admin_competition_index');
        }

        $athletesJson = $this->buildAthletesJson($em);

        return $this->render('admin/competitions/new.html.twig', [
            'title' => 'New competition',
            'athletesJson' => json_encode($athletesJson),
        ]);
    }

    #[Route('/edit/{id}', name: 'admin_competition_edit', methods: ['GET', 'POST'])]
    public function edit(Competition $competition, Request $request, EntityManagerInterface $em): Response
    {
        if ($request->isMethod('POST')) {
            $data = $request->request->all();
            /** @var UploadedFile|null $file */
            $file = $request->files->get('image');

            $competition->setTitle((string) ($data['title'] ?? ''));
            $competition->setCompetitionType($this->nullify($data['competitionType'] ?? null));
            $competition->setLocation((string) ($data['location'] ?? ''));

            $gender = $data['gender'] ?? null;
            $competition->setGender($gender === '' ? null : $gender);

            $competition->setTeamRanking($this->nullify($data['teamRanking'] ?? null));

            try {
                $eventDate = new \DateTimeImmutable((string) ($data['eventDate'] ?? ''));
                $competition->setEventDate($eventDate);
            } catch (\Throwable $e) {
                $this->addFlash('error', 'Invalid event date.');
                return $this->redirectToRoute('admin_competition_edit', ['id' => $competition->getId()]);
            }

            if ($file instanceof UploadedFile) {
                $newFilename = $this->uploadCompetitionImage($file);
                if ($newFilename === null) {
                    $this->addFlash('error', 'Image upload failed (invalid file or server error).');
                    return $this->redirectToRoute('admin_competition_edit', ['id' => $competition->getId()]);
                }

                $old = $competition->getImage();
                if ($old) {
                    $this->deleteCompetitionImageIfExists($old);
                }

                $competition->setImage($newFilename);
            }

            foreach ($competition->getResults() as $oldResult) {
                $em->remove($oldResult);
            }

            $results = $data['results'] ?? [];
            if (is_array($results)) {
                foreach ($results as $row) {
                    if (!is_array($row)) continue;

                    $lastName = $this->nullify($row['lastName'] ?? null);
                    $firstName = $this->nullify($row['firstName'] ?? null);

                    if ($lastName === null && $firstName === null) continue;

                    $result = new CompetitionResult();
                    $result->setLastName($lastName ?? '');
                    $result->setFirstName($firstName ?? '');

                    $result->setCategory($this->nullify($row['category'] ?? null));
                    $result->setWeightClass($this->nullify($row['weightClass'] ?? null));

                    $result->setSnatch((float) ($row['snatch'] ?? 0));
                    $result->setCleanAndJerk((float) ($row['cleanAndJerk'] ?? 0));

                    $points = $row['points'] ?? null;
                    $result->setPoints($points === '' || $points === null ? null : (float) $points);

                    $bw = $row['bodyWeight'] ?? null;
                    $result->setBodyWeight($bw === '' || $bw === null ? null : (float) $bw);

                    $result->setRankingLevel($this->nullify($row['rankingLevel'] ?? null));

                    $result->setCompetition($competition);
                    $em->persist($result);
                }
            }

            $em->flush();
            $this->addFlash('success', 'Competition updated.');
            return $this->redirectToRoute('admin_competition_index');
        }

        $athletesJson = $this->buildAthletesJson($em);

        return $this->render('admin/competitions/edit.html.twig', [
            'competition' => $competition,
            'athletesJson' => json_encode($athletesJson),
        ]);
    }

    #[Route('/delete/{id}', name: 'admin_competition_delete', methods: ['POST'])]
    public function delete(Request $request, Competition $competition, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete' . $competition->getId(), $request->request->get('_token'))) {
            if ($competition->getImage()) {
                $this->deleteCompetitionImageIfExists($competition->getImage());
            }

            $em->remove($competition);
            $em->flush();
            $this->addFlash('success', 'Competition deleted.');
        }

        return $this->redirectToRoute('admin_competition_index');
    }

    // =========================================================
    // Helpers
    // =========================================================

    private function nullify(mixed $value): ?string
    {
        $v = is_string($value) ? trim($value) : null;
        return ($v === '' || $v === null) ? null : $v;
    }

    private function buildAthletesJson(EntityManagerInterface $em): array
    {
        /** @var Athlete[] $athletes */
        $athletes = $em->getRepository(Athlete::class)->findBy([], ['lastName' => 'ASC']);

        $athletesData = [];
        foreach ($athletes as $athlete) {
            $athletesData[] = [
                'id' => $athlete->getId(),
                'firstName' => $athlete->getFirstName(),
                'lastName' => $athlete->getLastName(),
                'gender' => $athlete->getGender(),
                'category' => $athlete->getCategory() ?? '',
                'weightClass' => $athlete->getWeightClass() ?? '',
            ];
        }

        return $athletesData;
    }

    private function uploadCompetitionImage(UploadedFile $file): ?string
    {
        $allowedExt = ['jpg', 'jpeg', 'png', 'webp'];
        $ext = strtolower((string) $file->guessExtension());
        if (!in_array($ext, $allowedExt, true)) {
            return null;
        }

        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = transliterator_transliterate(
            'Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()',
            $originalFilename
        );

        $newFilename = ($safeFilename ?: 'competition') . '-' . bin2hex(random_bytes(6)) . '.' . $ext;

        $uploadDir = rtrim((string) $this->getParameter('upload_dir'), '/') . '/competitions';
        if (!is_dir($uploadDir)) {
            @mkdir($uploadDir, 0775, true);
        }

        try {
            $file->move($uploadDir, $newFilename);
            return $newFilename;
        } catch (\Throwable $e) {
            return null;
        }
    }

    private function deleteCompetitionImageIfExists(string $filename): void
    {
        $filename = basename($filename);
        $path = rtrim((string) $this->getParameter('upload_dir'), '/') . '/competitions/' . $filename;

        if (is_file($path)) {
            @unlink($path);
        }
    }
}
