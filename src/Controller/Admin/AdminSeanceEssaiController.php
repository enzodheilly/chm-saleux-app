<?php

namespace App\Controller\Admin;

use App\Entity\SeanceEssai;
use App\Repository\LicenceRepository;
use App\Repository\SeanceEssaiRepository;
use App\Service\SystemLoggerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/gestion-chm-secrete-92x/seances-initiation', name: 'admin_seance_essai_')]
#[IsGranted('ROLE_STAFF')]
class AdminSeanceEssaiController extends AbstractController
{
    #[Route('', name: 'index', methods: ['GET'])]
    public function index(
        Request $request,
        SeanceEssaiRepository $seanceRepo,
        LicenceRepository $licenceRepo
    ): Response {
        $query = trim((string) $request->query->get('q', ''));

        $searchEssais   = [];
        $searchLicences = [];
        $searched       = false;

        if ($query !== '') {
            $searched       = true;
            $searchEssais   = $seanceRepo->search($query);
            $searchLicences = $licenceRepo->searchByName($query);
        }

        $seances = $seanceRepo->findAllOrderedByDate();

        return $this->render('admin/seance_essai/index.html.twig', [
            'query'          => $query,
            'searched'       => $searched,
            'searchEssais'   => $searchEssais,
            'searchLicences' => $searchLicences,
            'sports'         => SeanceEssai::SPORTS,
            'seances'        => $seances,
        ]);
    }

    #[Route('/enregistrer', name: 'new', methods: ['POST'])]
    public function new(
        Request $request,
        EntityManagerInterface $em,
        SeanceEssaiRepository $seanceRepo,
        LicenceRepository $licenceRepo,
        SystemLoggerService $logger
    ): Response {
        if (!$this->isCsrfTokenValid('seance_essai_new', $request->request->get('_token'))) {
            $this->addFlash('danger', 'Token CSRF invalide.');
            return $this->redirectToRoute('admin_seance_essai_index');
        }

        $nom    = trim((string) $request->request->get('nom', ''));
        $prenom = trim((string) $request->request->get('prenom', ''));
        $sport  = trim((string) $request->request->get('sport', ''));

        if ($nom === '' || $prenom === '') {
            $this->addFlash('danger', 'Le nom et le prénom sont obligatoires.');
            return $this->redirectToRoute('admin_seance_essai_index');
        }

        if (!in_array($sport, SeanceEssai::SPORTS, true)) {
            $this->addFlash('danger', 'Sport invalide.');
            return $this->redirectToRoute('admin_seance_essai_index');
        }

        // Guard : vérification côté serveur avant d'enregistrer
        $termGuard      = $prenom . ' ' . $nom;
        $existsEssais   = $seanceRepo->search($termGuard);
        $existsLicences = $licenceRepo->searchByName($termGuard);

        if ($existsEssais !== [] || $existsLicences !== []) {
            $this->addFlash('danger', 'Un enregistrement correspondant à ce nom existe déjà. Vérifiez les résultats de recherche.');
            return $this->redirectToRoute('admin_seance_essai_index', ['q' => $termGuard]);
        }

        $dateRaw = $request->request->get('date_seance', '');
        try {
            $date = new \DateTimeImmutable((string) $dateRaw);
        } catch (\Exception) {
            $date = new \DateTimeImmutable();
        }

        $seance = (new SeanceEssai())
            ->setNom($nom)
            ->setPrenom($prenom)
            ->setSport($sport)
            ->setDateSeance($date);

        $em->persist($seance);
        $em->flush();

        $logger->add(SystemLoggerService::TYPE_ADMIN, "Séance d'initiation enregistrée : {$prenom} {$nom} ({$sport})");

        return $this->redirectToRoute('admin_seance_essai_print', ['id' => $seance->getId()]);
    }

    #[Route('/{id}/imprimer', name: 'print', methods: ['GET'])]
    public function print(SeanceEssai $seance): Response
    {
        return $this->render('admin/seance_essai/print.html.twig', [
            'seance' => $seance,
        ]);
    }
}
