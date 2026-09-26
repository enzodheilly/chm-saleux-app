<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260926190000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Ajoute le suivi de la gratuité "Benjamin" (parent déjà licencié) sur demandes_licence';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("ALTER TABLE demandes_licence ADD gratuite_appliquee TINYINT(1) NOT NULL DEFAULT 0");
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE demandes_licence DROP gratuite_appliquee');
    }
}
