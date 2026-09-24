<?php

namespace App\Service;

use Dompdf\Dompdf;
use Dompdf\Options;
use Twig\Environment;

class DiscoverySessionPdfService
{
    public function __construct(
        private readonly Environment $twig,
        private readonly string $projectDir,
    ) {}

    public function generate(array $data): string
    {
        $logoPath = $this->projectDir . '/public/images/favicon/icon2.png';
        $logoDataUri = '';
        if (file_exists($logoPath)) {
            $ext = strtolower(pathinfo($logoPath, PATHINFO_EXTENSION));
            $mime = $ext === 'svg' ? 'image/svg+xml' : "image/$ext";
            $logoDataUri = "data:$mime;base64," . base64_encode((string) file_get_contents($logoPath));
        }

        $html = $this->twig->render('pdf/discovery_session.html.twig', array_merge(
            $data,
            ['logoDataUri' => $logoDataUri]
        ));

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
