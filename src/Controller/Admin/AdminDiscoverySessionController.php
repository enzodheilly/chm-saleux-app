<?php

namespace App\Controller\Admin;

use App\Form\DiscoverySessionType;
use App\Service\DiscoverySessionPdfService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/gestion-chm-secrete-92x/seance-decouverte', name: 'admin_discovery_session_')]
#[IsGranted('ROLE_STAFF')]
class AdminDiscoverySessionController extends AbstractController
{
    #[Route('', name: 'index', methods: ['GET', 'POST'])]
    public function index(
        Request $request,
        DiscoverySessionPdfService $pdfService,
    ): Response {
        $form = $this->createForm(DiscoverySessionType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            /** @var \DateTimeInterface $birthDate */
            $birthDate = $data['birthDate'];
            /** @var \DateTimeInterface $signDate */
            $signDate = $data['signDate'];

            $pdfData = [
                'fullName'      => $data['fullName'],
                'discipline'    => $data['discipline'],
                'sex'           => $data['sex'],
                'birthDay'      => $birthDate->format('d'),
                'birthMonth'    => $birthDate->format('m'),
                'birthYear'     => $birthDate->format('Y'),
                'address'       => $data['address'],
                'phone'         => $data['phone'],
                'email'         => $data['email'],
                'legalName'     => $data['legalName'] ?? '',
                'legalRelation' => $data['legalRelation'] ?? '',
                'legalPhone'    => $data['legalPhone'] ?? '',
                'legalEmail'    => $data['legalEmail'] ?? '',
                'signeeName'    => $data['signeeName'],
                'signPlace'     => $data['signPlace'],
                'signDay'       => $signDate->format('d'),
                'signMonth'     => $signDate->format('m'),
                'signYear'      => $signDate->format('Y'),
            ];

            $pdf = $pdfService->generate($pdfData);

            $filename = sprintf(
                'seance-decouverte-%s-%s.pdf',
                date('Ymd'),
                preg_replace('/[^a-z0-9]+/', '-', strtolower((string) $data['fullName']))
            );

            return new Response($pdf, 200, [
                'Content-Type'        => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ]);
        }

        return $this->render('admin/discovery_session/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
