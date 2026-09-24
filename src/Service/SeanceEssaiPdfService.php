<?php

namespace App\Service;

use App\Entity\SeanceEssai;
use Dompdf\Dompdf;
use Dompdf\Options;
use Twig\Environment;

class SeanceEssaiPdfService
{
    public function __construct(
        private readonly Environment $twig,
        private readonly string $projectDir,
    ) {}

    public function generate(SeanceEssai $seance): string
    {
        $logoPath = $this->projectDir . '/public/images/favicon/icon2.png';
        $logoDataUri = '';
        if (file_exists($logoPath)) {
            $ext = strtolower(pathinfo($logoPath, PATHINFO_EXTENSION));
            $mime = $ext === 'svg' ? 'image/svg+xml' : "image/$ext";
            $logoDataUri = "data:$mime;base64," . base64_encode((string) file_get_contents($logoPath));
        }

        $dateNaissance = $seance->getDateNaissance();
        $dateSignature = $seance->getDateSignature() ?? $seance->getDateSeance();

        $html = $this->twig->render('pdf/seance_essai.html.twig', [
            'logoDataUri'   => $logoDataUri,
            'nom'           => $seance->getNom(),
            'prenom'        => $seance->getPrenom(),
            'sport'         => $seance->getSport(),
            'sexe'          => $seance->getSexe(),
            'birthDay'      => $dateNaissance?->format('d') ?? '',
            'birthMonth'    => $dateNaissance?->format('m') ?? '',
            'birthYear'     => $dateNaissance?->format('Y') ?? '',
            'adresse'       => $seance->getAdresse() ?? '',
            'telephone'     => $seance->getTelephone() ?? '',
            'email'         => $seance->getEmail() ?? '',
            'responsableNom'        => $seance->getResponsableNom() ?? '',
            'responsableLien'       => $seance->getResponsableLien() ?? '',
            'responsableTelephone'  => $seance->getResponsableTelephone() ?? '',
            'responsableEmail'      => $seance->getResponsableEmail() ?? '',
            'lieuSignature' => $seance->getLieuSignature() ?? 'Saleux',
            'signDay'       => $dateSignature->format('d'),
            'signMonth'     => $dateSignature->format('m'),
            'signYear'      => $dateSignature->format('Y'),
        ]);

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', false);
        $options->set('defaultFont', 'Helvetica');

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->output();
    }
}
