<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Repository\SecurityLogRepository;
use App\Repository\UserRepository;
use App\Service\SystemLoggerService;
use Doctrine\ORM\EntityManagerInterface;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Scheb\TwoFactorBundle\Security\TwoFactor\Provider\Google\GoogleAuthenticatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/gestion-chm-secrete-92x/security', name: 'admin_security_')]
#[IsGranted('ROLE_SUPER_ADMIN')]
class AdminSecurityController extends AbstractController
{
    /**
     * 📋 Journal des connexions
     */
    #[Route('/logs', name: 'logs')]
    public function logs(SecurityLogRepository $repo, Request $request): Response
    {
        $filter = $request->query->get('filter', 'all');
        if (!in_array($filter, ['all', 'connexion', 'echec', 'admin', 'securite'], true)) {
            $filter = 'all';
        }

        $logs = $repo->findFiltered($filter, 200);

        $stats = [
            'total'      => $repo->countAll(),
            'connexions' => $repo->countByTypeAndSuccess('Connexion', true),
            'echecs'     => $repo->countByTypeAndSuccess('Connexion', false),
            'admin'      => $repo->countByTypeAndSuccess('Admin'),
        ];

        $topTargets = $repo->createQueryBuilder('l')
            ->join('l.user', 'u')
            ->select('u.id AS userId, u.email AS email, COUNT(l.id) AS attempts')
            ->where('l.type = :type')
            ->andWhere('l.success = :s')
            ->andWhere('l.user IS NOT NULL')
            ->setParameter('type', 'Connexion')
            ->setParameter('s', false)
            ->groupBy('u.id, u.email')
            ->orderBy('attempts', 'DESC')
            ->setMaxResults(4)
            ->getQuery()
            ->getArrayResult();

        return $this->render('admin/security/logs.html.twig', [
            'logs'       => $logs,
            'topTargets' => $topTargets,
            'stats'      => $stats,
            'filter'     => $filter,
        ]);
    }

    /**
     * 🚫 Liste les utilisateurs actuellement bloqués
     */
    #[Route('/blocklist', name: 'blocklist')]
    public function blocklist(UserRepository $userRepository): Response
    {
        $now = new \DateTimeImmutable();

        $blockedUsers = $userRepository->createQueryBuilder('u')
            ->where('u.lockedUntil IS NOT NULL')
            ->andWhere('u.lockedUntil > :now')
            ->setParameter('now', $now)
            ->orderBy('u.lockedUntil', 'DESC')
            ->getQuery()
            ->getResult();

        return $this->render('admin/security/blocklist.html.twig', [
            'blockedIps' => array_map(function (User $user) {
                return [
                    'id' => $user->getId(),
                    'email' => $user->getEmail(),
                    'ip' => $user->getLastLoginIp() ?? '—',
                    'reason' => 'Trop d\'échecs de connexion',
                    'blockedAt' => $user->getLockedUntil(),
                ];
            }, $blockedUsers),
        ]);
    }

    /**
     * 🔓 Débloquer un utilisateur manuellement
     */
    #[Route('/blocklist/unlock/{id}', name: 'unlock_user', methods: ['POST'])]
    public function unlockUser(Request $request, UserRepository $userRepository, EntityManagerInterface $em, SystemLoggerService $logger, int $id): Response
    {
        if (!$this->isCsrfTokenValid('unlock_user_' . $id, (string) $request->request->get('_token', ''))) {
            $this->addFlash('error', 'Jeton CSRF invalide.');
            return $this->redirectToRoute('admin_security_blocklist');
        }

        $user = $userRepository->find($id);

        if (!$user) {
            $this->addFlash('error', 'Utilisateur introuvable.');
            return $this->redirectToRoute('admin_security_blocklist');
        }

        $user->setLockedUntil(null);
        $user->setFailedAttempts(0);
        $em->flush();
        $logger->add(SystemLoggerService::TYPE_SECURITE, 'Déblocage utilisateur : ' . $user->getEmail());

        // ✅ XSS — échappement de l'email
        $this->addFlash('success', sprintf(
            "✅ L'accès pour <strong>%s</strong> a été rétabli.",
            htmlspecialchars($user->getEmail(), ENT_QUOTES, 'UTF-8')
        ));

        return $this->redirectToRoute('admin_security_blocklist');
    }

    /**
     * 🧹 Purge tous les logs de connexion
     */
    #[Route('/purge', name: 'purge_logs', methods: ['POST'])]
    public function purge(Request $request, SecurityLogRepository $repo, SystemLoggerService $logger): Response
    {
        if (!$this->isCsrfTokenValid('purge_logs', (string) $request->request->get('_token', ''))) {
            $this->addFlash('error', 'Jeton CSRF invalide.');
            return $this->redirectToRoute('admin_security_logs');
        }

        $repo->createQueryBuilder('l')
            ->delete()
            ->getQuery()
            ->execute();

        $logger->add(SystemLoggerService::TYPE_SECURITE, 'Purge complète de l\'historique des journaux de sécurité.');

        $this->addFlash('success', '🧹 Historique de sécurité réinitialisé avec succès.');
        return $this->redirectToRoute('admin_security_logs');
    }

    /**
     * 🔐 Configuration du 2FA (Google Authenticator)
     */
    #[Route('/setup-2fa', name: '2fa_setup')]
    public function setup(
        Request $request,
        GoogleAuthenticatorInterface $ga,
        EntityManagerInterface $em,
        SystemLoggerService $logger
    ): Response {
        /** @var User $user */
        $user = $this->getUser();

        if ($user->isTotpConfirmed()) {
            return $this->redirectToRoute('admin_dashboard');
        }

        if (!$user->getGoogleAuthenticatorSecret()) {
            $user->setGoogleAuthenticatorSecret($ga->generateSecret());
            $em->flush();
        }

        $qrContent = $ga->getQRContent($user);

        $writer = new PngWriter();
        $qrCode = new QrCode(
            data: $qrContent,
            encoding: new Encoding('UTF-8'),
            errorCorrectionLevel: ErrorCorrectionLevel::High,
            size: 200,
            margin: 10
        );

        $result = $writer->write($qrCode);
        $qrCodeBase64 = $result->getDataUri();

        if ($request->isMethod('POST')) {

            // ✅ CSRF
            if (!$this->isCsrfTokenValid('setup_2fa', (string) $request->request->get('_token', ''))) {
                $this->addFlash('danger', 'Jeton CSRF invalide.');
                return $this->redirectToRoute('admin_security_2fa_setup');
            }

            $authCode = $request->request->get('auth_code');

            if ($ga->checkCode($user, $authCode)) {
                $user->setIsTotpConfirmed(true);

                // Générer les codes en clair (affichage unique à l'admin)
                $plainCodes = [];
                for ($i = 0; $i < 5; $i++) {
                    $plainCodes[] = strtoupper(bin2hex(random_bytes(2)) . '-' . bin2hex(random_bytes(2)));
                }

                // Hacher les codes avant stockage en BDD
                $hashedCodes = array_map(
                    fn(string $code) => password_hash($code, PASSWORD_BCRYPT),
                    $plainCodes
                );
                $user->setBackupCodes($hashedCodes);
                $em->flush();

                $logger->add(SystemLoggerService::TYPE_SECURITE, 'Activation de la double authentification (2FA) avec codes de secours.');

                // On passe les codes EN CLAIR en session pour affichage unique
                $request->getSession()->set('show_backup_codes', $plainCodes);

                $this->addFlash('success', 'Sécurité activée ! Notez bien vos codes de secours.');

                return $this->redirectToRoute('admin_security_setup_success');
            }

            $this->addFlash('danger', 'Le code est incorrect.');
        }

        return $this->render('admin/security/setup_2fa.html.twig', [
            'qrCodeBase64' => $qrCodeBase64,
            'qrContent' => $qrContent,
        ]);
    }

    #[Route('/setup-2fa/success', name: 'setup_success')]
    public function setupSuccess(Request $request): Response
    {
        $backupCodes = $request->getSession()->remove('show_backup_codes');

        if (!$backupCodes) {
            $this->addFlash('warning', 'Les codes de secours ne sont affichés qu\'une seule fois pour votre sécurité.');
            return $this->redirectToRoute('admin_dashboard');
        }

        return $this->render('admin/security/setup_success.html.twig', [
            'backupCodes' => $backupCodes,
        ]);
    }

    /**
     * 🔐 Réinitialiser le 2FA d'un utilisateur
     */
    #[Route('/reset-2fa/{id}', name: 'reset_2fa', methods: ['POST'])]
    public function reset2fa(
        Request $request,
        int $id,
        UserRepository $userRepository,
        EntityManagerInterface $em,
        SystemLoggerService $logger
    ): Response {
        if (!$this->isCsrfTokenValid('reset_2fa_' . $id, (string) $request->request->get('_token', ''))) {
            $this->addFlash('error', 'Jeton CSRF invalide.');
            return $this->redirectToRoute('admin_security_blocklist');
        }

        $user = $userRepository->find($id);

        if (!$user) {
            $this->addFlash('error', 'Utilisateur introuvable.');
            return $this->redirectToRoute('admin_security_blocklist');
        }

        $user->setGoogleAuthenticatorSecret(null);
        $user->setIsTotpConfirmed(false);
        $em->flush();

        $logger->add(SystemLoggerService::TYPE_SECURITE, 'Réinitialisation 2FA : ' . $user->getEmail());

        // ✅ XSS — échappement de l'email
        $this->addFlash('success', sprintf(
            "✅ La sécurité 2FA de <strong>%s</strong> a été réinitialisée.",
            htmlspecialchars($user->getEmail(), ENT_QUOTES, 'UTF-8')
        ));

        return $this->redirectToRoute('admin_security_blocklist');
    }

    /**
     * 🔨 Bannir une IP
     */
    #[Route('/blocklist/ban-ip/{ip}', name: 'ban_ip', methods: ['POST'])]
    public function banIp(
        Request $request,
        string $ip,
        SecurityLogRepository $repo,
        EntityManagerInterface $em,
        SystemLoggerService $logger
    ): Response {
        if (!$this->isCsrfTokenValid('ban_ip_' . $ip, (string) $request->request->get('_token', ''))) {
            $this->addFlash('error', 'Jeton CSRF invalide.');
            return $this->redirectToRoute('admin_security_logs');
        }

        if (!filter_var($ip, FILTER_VALIDATE_IP)) {
            $this->addFlash('error', 'Adresse IP invalide.');
            return $this->redirectToRoute('admin_security_logs');
        }

        $lastLog = $repo->findOneBy(['ip' => $ip], ['createdAt' => 'DESC']);
        $found = false;

        if ($lastLog && $lastLog->getUser()) {
            $userToBan = $lastLog->getUser();
            $userToBan->setLockedUntil(new \DateTimeImmutable('+99 years'));
            $em->persist($userToBan);
            $em->flush();
            $found = true;
        }

        $logger->add(SystemLoggerService::TYPE_SECURITE, 'Bannissement manuel IP : ' . $ip);

        if ($found) {
            $this->addFlash('success', sprintf(
                "🚫 L'adresse IP <strong>%s</strong> a été bannie.",
                htmlspecialchars($ip, ENT_QUOTES, 'UTF-8')
            ));
        } else {
            $this->addFlash('warning', sprintf(
                "⚠️ Aucun utilisateur trouvé pour l'IP <strong>%s</strong>. Action journalisée.",
                htmlspecialchars($ip, ENT_QUOTES, 'UTF-8')
            ));
        }

        return $this->redirectToRoute('admin_security_logs');
    }

    /**
     * 📥 Exportation CSV
     */
    #[Route('/export-csv', name: 'export_csv', methods: ['POST'])]
    public function exportCsv(Request $request, SecurityLogRepository $repo): Response
    {
        if (!$this->isCsrfTokenValid('export_csv', (string) $request->request->get('_token', ''))) {
            $this->addFlash('error', 'Jeton CSRF invalide.');
            return $this->redirectToRoute('admin_security_logs');
        }

        $logs = $repo->createQueryBuilder('l')
            ->orderBy('l.createdAt', 'DESC')
            ->setMaxResults(10000)
            ->getQuery()
            ->getResult();

        $rows = [['ID', 'Date', 'Utilisateur', 'IP', 'Action']];

        foreach ($logs as $log) {
            $rows[] = [
                $log->getId(),
                $log->getCreatedAt()->format('Y-m-d H:i:s'),
                $log->getUser() ? $log->getUser()->getEmail() : 'Système',
                $log->getIp(),
                $log->getMessage(),
            ];
        }

        $callback = function () use ($rows) {
            $file = fopen('php://output', 'w');
            fprintf($file, chr(0xEF) . chr(0xBB) . chr(0xBF));

            foreach ($rows as $row) {
                fputcsv($file, $row, ';');
            }

            fclose($file);
        };

        return new StreamedResponse($callback, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="logs_securite_' . date('Y-m-d') . '.csv"',
        ]);
    }
}
