<?php
// src/Controller/Admin/AdminLogsController.php

namespace App\Controller\Admin;

use App\Repository\LogRepository; // ou SystemLogRepository si c'est le bon
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/security/logs', name: 'admin_security_logs')]
class AdminLogsController extends AbstractController
{
    public function __invoke(LogRepository $logRepo): Response
    {
        $limit = 100;

        $systemLogs = $logRepo->findBy(
            [],
            ['createdAt' => 'DESC'],
            $limit,
            0
        );

        return $this->render('admin/security/logs.html.twig', [
            'logs' => $systemLogs,
            'logLimit' => $limit,
        ]);
    }
}
