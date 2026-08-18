<?php

namespace App\EventSubscriber;

use App\Entity\SecurityLog;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Events;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

// Écouteur désactivé temporairement : les requêtes de dev/test en dehors des
// heures normales déclenchaient l'envoi de milliers d'emails d'alerte.
// Pour réactiver, remettre l'attribut ci-dessous.
// #[AsEntityListener(event: Events::postPersist, method: 'postPersist', entity: SecurityLog::class)]
class SecurityLogSubscriber
{
    public function __construct(
        private readonly MailerInterface $mailer,
        private readonly string $adminEmail,
        private readonly string $adminSiteUrl
    ) {}

    public function postPersist(SecurityLog $log): void
    {
        $hour = (int) $log->getCreatedAt()->format('H');

        if ($hour < 6 || $hour >= 22) {
            $user    = htmlspecialchars((string) $log->getUser(), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
            $message = htmlspecialchars((string) $log->getMessage(), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
            $ip      = htmlspecialchars((string) $log->getIp(), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
            $logsUrl = htmlspecialchars($this->adminSiteUrl . '/admin/security/logs', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
            $date    = $log->getCreatedAt()->format('d/m/Y H:i:s');

            $email = (new Email())
                ->from('no-reply@chm-saleux.fr')
                ->to($this->adminEmail)
                ->subject('ALERTE : Activité nocturne détectée')
                ->html("
                    <h2>Alerte de Sécurité</h2>
                    <p>Une activité suspecte a été détectée en dehors des heures normales :</p>
                    <ul>
                        <li><strong>Utilisateur :</strong> {$user}</li>
                        <li><strong>Action :</strong> {$message}</li>
                        <li><strong>IP :</strong> {$ip}</li>
                        <li><strong>Heure :</strong> {$date}</li>
                    </ul>
                    <p><a href='{$logsUrl}'>Consulter les journaux</a></p>
                ");

            $this->mailer->send($email);
        }
    }
}
