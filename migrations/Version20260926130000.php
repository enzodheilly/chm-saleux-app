<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260926130000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'DemandeLicence : type_inscription (nouvelle/renouvellement) + FK vers licence créée automatiquement';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("ALTER TABLE demandes_licence ADD type_inscription VARCHAR(20) DEFAULT 'nouvelle' NOT NULL");
        $this->addSql('ALTER TABLE demandes_licence ADD licence_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE demandes_licence ADD CONSTRAINT FK_demandes_licence_licence FOREIGN KEY (licence_id) REFERENCES licence (id) ON DELETE SET NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DEMANDES_LICENCE_LICENCE_ID ON demandes_licence (licence_id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE demandes_licence DROP FOREIGN KEY FK_demandes_licence_licence');
        $this->addSql('DROP INDEX UNIQ_DEMANDES_LICENCE_LICENCE_ID ON demandes_licence');
        $this->addSql('ALTER TABLE demandes_licence DROP licence_id');
        $this->addSql('ALTER TABLE demandes_licence DROP type_inscription');
    }
}
