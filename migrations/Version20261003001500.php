<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20261003001500 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Licence : ajout du flag historique (licences importées depuis les archives 2020-2026, à distinguer des licences créées via le nouveau formulaire en ligne)';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE licence ADD historique TINYINT(1) NOT NULL DEFAULT 0');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE licence DROP historique');
    }
}
