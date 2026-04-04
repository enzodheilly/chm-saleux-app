<?php

namespace App\EventSubscriber;

use App\Entity\SecurityLog;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

#[AsEntityListener(event: Events::postPersist, method: 'postPersist', entity: SecurityLog::class)]
class SecurityLogSubscriber
{
    public function __construct(
        private readonly MailerInterface $mailer,
        private readonly string $adminEmail,
        private readonly string $adminSiteUrl
    ) {}

    public function postPersist(SecurityLog $log, LifecycleEventArgs $event): void
    {
        $hour = (int) $log->getCreatedAt()->format('H');

        // Si l'activité est entre 22h et 6h
        if ($hour < 6 || $hour >= 22) {
            $email = (new Email())
                ->from('enzodheilly134@gmail.com')
                ->to($this->adminEmail)
                ->subject('🚨 ALERTE : Activité nocturne détectée')
                ->html("
                    <h2>Alerte de Sécurité</h2>
                    <p>Une activité suspecte a été détectée en dehors des heures normales :</p>
                    <ul>
                        <li><strong>Utilisateur :</strong> {$log->getUser()}</li>
                        <li><strong>Action :</strong> {$log->getMessage()}</li>
                        <li><strong>IP :</strong> {$log->getIp()}</li>
                        <li><strong>Heure :</strong> {$log->getCreatedAt()->format('d/m/Y H:i:s')}</li>
                    </ul>
                    <p><a href='{$this->adminSiteUrl}/admin/security/logs'>Consulter les journaux</a></p>
                ");

            $this->mailer->send($email);
        }
    }
}
