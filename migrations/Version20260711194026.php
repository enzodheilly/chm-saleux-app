<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260711194026 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Ajoute le QR code d\'accès aux adhérents (User) et la table check_in pour le pointage entrée/sortie.';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE check_in (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, type VARCHAR(3) NOT NULL, scanned_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', source VARCHAR(50) DEFAULT NULL, INDEX IDX_90466CF9A76ED395 (user_id), INDEX idx_check_in_user_scanned_at (user_id, scanned_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE check_in ADD CONSTRAINT FK_90466CF9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD qr_code_token VARCHAR(64) DEFAULT NULL, ADD qr_code_updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D6491BC9050B ON user (qr_code_token)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE check_in DROP FOREIGN KEY FK_90466CF9A76ED395');
        $this->addSql('DROP TABLE check_in');
        $this->addSql('DROP INDEX UNIQ_8D93D6491BC9050B ON user');
        $this->addSql('ALTER TABLE user DROP qr_code_token, DROP qr_code_updated_at');
    }
}
