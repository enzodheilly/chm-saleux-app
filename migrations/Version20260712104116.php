<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260712104116 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Supprime la table check_in : la page Fréquentation & Scanner du back-office (seul point d\'entrée possible pour ces données) a été retirée.';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE check_in DROP FOREIGN KEY FK_90466CF926EF07C9');
        $this->addSql('DROP TABLE check_in');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE check_in (id INT AUTO_INCREMENT NOT NULL, licence_id INT NOT NULL, type VARCHAR(3) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, scanned_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', source VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_90466CF926EF07C9 (licence_id), INDEX idx_check_in_licence_scanned_at (licence_id, scanned_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE check_in ADD CONSTRAINT FK_90466CF926EF07C9 FOREIGN KEY (licence_id) REFERENCES licence (id) ON UPDATE NO ACTION ON DELETE CASCADE');
    }
}
