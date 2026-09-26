<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260926150000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Ajoute la détection nouvelle/renouvellement et le lien vers la licence créée (Phase 3)';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("ALTER TABLE demandes_licence ADD type_demande VARCHAR(20) NOT NULL DEFAULT 'nouvelle'");
        $this->addSql('ALTER TABLE demandes_licence ADD derniere_licence_connue_le DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\'');
        $this->addSql('ALTER TABLE demandes_licence ADD licence_creee_id INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE demandes_licence DROP type_demande');
        $this->addSql('ALTER TABLE demandes_licence DROP derniere_licence_connue_le');
        $this->addSql('ALTER TABLE demandes_licence DROP licence_creee_id');
    }
}
