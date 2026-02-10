<?php

namespace App\Controller\Admin;

use App\Entity\SecurityLog;
use App\Repository\SecurityLogRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Scheb\TwoFactorBundle\Security\TwoFactor\Provider\Google\GoogleAuthenticatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\StreamedResponse;

#[Route('/admin/security', name: 'admin_security_')]
class AdminSecurityController extends AbstractController
{
    /**
     * 📋 Journal des connexions
     * Affiche les 100 derniers événements avec les détails techniques (IP, Appareil)
     */
    #[Route('/logs', name: 'logs')]
    public function logs(SecurityLogRepository $repo): Response
    {
        // Récupération des logs avec les nouvelles propriétés
        $logs = $repo->findBy([], ['createdAt' => 'DESC'], 100);

        return $this->render('admin/security/logs.html.twig', [
            'logs' => $logs,
        ]);
    }

    /**
     * 🚫 Liste les utilisateurs actuellement bloqués
     */
    #[Route('/blocklist', name: 'blocklist')]
    public function blocklist(UserRepository $userRepository): Response
    {
        $now = new \DateTimeImmutable();

        // Récupère les utilisateurs dont le verrouillage n'est pas encore expiré
        $blockedUsers = $userRepository->createQueryBuilder('u')
            ->where('u.lockedUntil IS NOT NULL')
            ->andWhere('u.lockedUntil > :now')
            ->setParameter('now', $now)
            ->orderBy('u.lockedUntil', 'DESC')
            ->getQuery()
            ->getResult();

        return $this->render('admin/security/blocklist.html.twig', [
            'blockedIps' => array_map(function ($user) {
                return [
                    'id' => $user->getId(),
                    'email' => $user->getEmail(),
                    'ip' => $user->getLastLoginIp() ?? '—',
                    'reason' => 'Trop d’échecs de connexion',
                    'blockedAt' => $user->getLockedUntil(),
                ];
            }, $blockedUsers),
        ]);
    }

    /**
     * 🔓 Débloquer un utilisateur manuellement
     */
    #[Route('/blocklist/unlock/{id}', name: 'unlock_user')]
    public function unlockUser(UserRepository $userRepository, EntityManagerInterface $em, int $id): Response
    {
        $user = $userRepository->find($id);

        if (!$user) {
            $this->addFlash('error', 'Utilisateur introuvable.');
            return $this->redirectToRoute('admin_security_blocklist');
        }

        $user->setLockedUntil(null);
        $user->setFailedAttempts(0);
        $em->flush();

        $this->addFlash('success', "✅ L’utilisateur <strong>{$user->getEmail()}</strong> a été débloqué.");
        return $this->redirectToRoute('admin_security_blocklist');
    }

    /**
     * 🧹 Purge tous les logs de connexion
     */
    #[Route('/purge', name: 'purge_logs')]
    public function purge(SecurityLogRepository $repo, EntityManagerInterface $em, Request $request): Response
    {
        // On vide la table
        $repo->createQueryBuilder('l')->delete()->getQuery()->execute();

        // On log l'action de l'admin
        $log = new SecurityLog();
        $log->setType('Session');
        $log->setMessage('L\'historique complet des journaux a été purgé par l\'administrateur.');
        $log->setUser($this->getUser() ? $this->getUser()->getUserIdentifier() : 'Système');
        $log->setIp($request->getClientIp());
        $log->setUserAgent($request->headers->get('User-Agent'));
        $log->setMethod($request->getMethod());

        $em->persist($log);
        $em->flush();

        $this->addFlash('success', '🧹 Tous les journaux de connexion ont été supprimés.');
        return $this->redirectToRoute('admin_security_logs');
    }

    /**
     * 🔐 Configuration du 2FA (Google Authenticator)
     */
    #[Route('/setup-2fa', name: '2fa_setup')]
    public function setup(
        Request $request,
        GoogleAuthenticatorInterface $ga,
        EntityManagerInterface $em
    ): Response {
        /** @var \App\Entity\User $user */
        $user = $this->getUser();

        if ($user->isTotpConfirmed()) {
            return $this->redirectToRoute('admin_dashboard');
        }

        if (!$user->getGoogleAuthenticatorSecret()) {
            $user->setGoogleAuthenticatorSecret($ga->generateSecret());
            $em->flush();
        }

        if ($request->isMethod('POST')) {
            $authCode = $request->request->get('auth_code');

            if ($ga->checkCode($user, $authCode)) {
                $user->setIsTotpConfirmed(true);

                // Log de l'activation du 2FA
                $log = new SecurityLog();
                $log->setType('connexion');
                $log->setMessage('Double authentification (2FA) activée avec succès.');
                $log->setUser($user->getUserIdentifier());
                $log->setIp($request->getClientIp());
                $log->setUserAgent($request->headers->get('User-Agent'));
                $log->setMethod($request->getMethod());
                $em->persist($log);

                $em->flush();

                $this->addFlash('success', 'Sécurité activée avec succès !');
                return $this->redirectToRoute('admin_dashboard');
            } else {
                $this->addFlash('danger', 'Le code est incorrect.');
            }
        }

        return $this->render('admin/security/setup_2fa.html.twig', [
            'qrCodeContent' => $ga->getQRContent($user)
        ]);
    }

    /**
     * 🔨 Bannir une IP et verrouiller l'utilisateur associé
     */
    #[Route('/blocklist/ban-ip/{ip}', name: 'ban_ip')]
    public function banIp(string $ip, SecurityLogRepository $repo, UserRepository $userRepository, EntityManagerInterface $em, Request $request): Response
    {
        // 1. On cherche le dernier utilisateur ayant utilisé cette IP
        $lastLog = $repo->findOneBy(['ip' => $ip], ['createdAt' => 'DESC']);

        if ($lastLog && $lastLog->getUser()) {
            $user = $userRepository->findOneBy(['email' => $lastLog->getUser()]);
            if ($user) {
                // Verrouillage pour 99 ans
                $user->setLockedUntil(new \DateTimeImmutable('+99 years'));
                $em->persist($user);
            }
        }

        // 2. On enregistre l'acte de bannissement
        $log = new SecurityLog();
        $log->setType('Session'); // Alerte orange
        $log->setMessage("L'adresse IP $ip a été bannie manuellement par l'administrateur.");
        $log->setUser($this->getUser()->getUserIdentifier());
        $log->setIp($request->getClientIp());
        $log->setUserAgent($request->headers->get('User-Agent'));
        $log->setMethod('POST');
        $em->persist($log);

        $em->flush();

        $this->addFlash('success', "🚫 L'IP <strong>$ip</strong> a été bannie et l'utilisateur associé a été verrouillé.");
        return $this->redirectToRoute('admin_security_logs');
    }

    #[Route('/export-csv', name: 'export_csv')]
    public function exportCsv(SecurityLogRepository $repo): Response
    {
        // Attention : vérifie que findAllOrdered() existe dans ton Repository
        $logs = $repo->findBy([], ['createdAt' => 'DESC']);

        $rows = [["ID", "Date", "Utilisateur", "IP", "Action"]];

        foreach ($logs as $log) {
            $rows[] = [
                $log->getId(),
                $log->getCreatedAt()->format('Y-m-d H:i'),
                $log->getUser(),
                $log->getIp(),
                $log->getMessage()
            ];
        }

        $callback = function () use ($rows) {
            $file = fopen('php://output', 'w');
            foreach ($rows as $row) {
                fputcsv($file, $row);
            }
            fclose($file);
        };

        return new StreamedResponse($callback, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="logs_securite.csv"',
        ]);
    }
}
