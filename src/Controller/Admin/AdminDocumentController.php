<?php

namespace App\Controller\Admin;

use App\Entity\ClubDocument;
use App\Repository\ClubDocumentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/gestion-chm-secrete-92x/documents', name: 'admin_document_')]
#[IsGranted('ROLE_ADMIN')]
class AdminDocumentController extends AbstractController
{
    private const SLUG = 'reglement-interieur';
    private const DEST = 'documents/reglement-interieur.pdf';

    private const THUMB = 'documents/reglement-interieur-thumb.png';

    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(ClubDocumentRepository $repo): Response
    {
        $thumbPath = $this->getParameter('kernel.project_dir') . '/public/' . self::THUMB;

        return $this->render('admin/documents/index.html.twig', [
            'title'        => 'Documents du club',
            'document'     => $repo->findBySlug(self::SLUG),
            'hasThumbnail' => file_exists($thumbPath),
        ]);
    }

    #[Route('/upload', name: 'upload', methods: ['POST'])]
    public function upload(
        Request $request,
        ClubDocumentRepository $repo,
        EntityManagerInterface $em
    ): Response {
        if (!$this->isCsrfTokenValid('doc_upload', $request->request->get('_token'))) {
            $this->addFlash('error', 'Jeton CSRF invalide.');
            return $this->redirectToRoute('admin_document_index');
        }

        $file = $request->files->get('pdf');

        if (!$file) {
            $this->addFlash('error', 'Aucun fichier sélectionné.');
            return $this->redirectToRoute('admin_document_index');
        }

        if ($file->getMimeType() !== 'application/pdf') {
            $this->addFlash('error', 'Le fichier doit être un PDF.');
            return $this->redirectToRoute('admin_document_index');
        }

        if ($file->getSize() > 20 * 1024 * 1024) {
            $this->addFlash('error', 'Le fichier ne doit pas dépasser 20 Mo.');
            return $this->redirectToRoute('admin_document_index');
        }

        $dest         = $this->getParameter('kernel.project_dir') . '/public/' . self::DEST;
        $originalName = $file->getClientOriginalName();
        $size         = $file->getSize();

        $file->move(dirname($dest), basename($dest));

        $this->generateThumbnail($dest);

        $doc = $repo->findBySlug(self::SLUG) ?? new ClubDocument(self::SLUG);
        $doc->setOriginalFilename($originalName)
            ->setFileSize($size ?: filesize($dest))
            ->setUploadedAt(new \DateTimeImmutable('now', new \DateTimeZone('Europe/Paris')));

        $em->persist($doc);
        $em->flush();

        $this->addFlash('success', 'Règlement intérieur mis à jour avec succès.');
        return $this->redirectToRoute('admin_document_index');
    }

    private function generateThumbnail(string $pdfPath): void
    {
        $dir   = dirname($pdfPath);
        $thumb = $dir . '/reglement-interieur-thumb.png';

        // Stratégie 1 : qlmanage (macOS)
        $qlmanage = trim((string) shell_exec('which qlmanage 2>/dev/null'));
        if ($qlmanage !== '') {
            $cmd = sprintf('qlmanage -t -s 400 -o %s %s > /dev/null 2>&1', escapeshellarg($dir), escapeshellarg($pdfPath));
            exec($cmd);
            // qlmanage génère <filename>.png dans le dossier de sortie
            $generated = $dir . '/' . basename($pdfPath) . '.png';
            if (file_exists($generated)) {
                rename($generated, $thumb);
            }
            if (file_exists($thumb)) {
                return;
            }
        }

        // Stratégie 2 : magick (ImageMagick v7) avec GhostScript
        $magick = trim((string) shell_exec('which magick 2>/dev/null'));
        if ($magick !== '') {
            $cmd = sprintf(
                '%s -density 96 -background white -alpha remove -flatten %s[0] -resize 360x480 %s > /dev/null 2>&1',
                escapeshellcmd($magick),
                escapeshellarg($pdfPath),
                escapeshellarg($thumb)
            );
            exec($cmd);
        }
    }
}
