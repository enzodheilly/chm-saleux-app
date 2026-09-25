<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260925230000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Ajoute la date de consentement RGPD sur demandes_licence (preuve de consentement)';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE demandes_licence ADD consentement_rgpd_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE demandes_licence DROP consentement_rgpd_at');
    }
}
