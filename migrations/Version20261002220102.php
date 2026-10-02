<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20261002220102 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Licence : email devient facultatif (tous les anciens adhérents n\'en ont pas) + ajout d\'un champ adresse, pour l\'import de l\'historique des licences 2020-2026';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE licence MODIFY email VARCHAR(180) DEFAULT NULL');
        $this->addSql('ALTER TABLE licence ADD adresse VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE licence DROP adresse');
        $this->addSql('ALTER TABLE licence MODIFY email VARCHAR(180) NOT NULL');
    }
}
