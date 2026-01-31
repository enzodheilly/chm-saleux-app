<?php

namespace App\Controller\Admin;

use App\Repository\LogRepository; // Assure-toi que c'est le bon Repository (SystemLogRepository ?)
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// J'ai adapté la route pour qu'elle colle avec ton menu Sidebar "admin_security_logs"
#[Route('/admin/security/logs', name: 'admin_security_logs')]
class LogsAdminController extends AbstractController
{
    public function __invoke(LogRepository $logRepo): Response
    {
        // On récupère seulement les 100 derniers logs pour ne pas surcharger la page
        $limit = 100;

        $systemLogs = $logRepo->findBy(
            [],                     // Critères (aucun = tout)
            ['createdAt' => 'DESC'], // Tri (plus récent en premier)
            $limit,                  // Limite
            0                        // Offset (départ)
        );

        return $this->render('admin/security/logs.html.twig', [
            'systemLogs' => $systemLogs,
            'logLimit' => $limit
        ]);
    }
}
