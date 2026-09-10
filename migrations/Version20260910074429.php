<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260910074429 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE site_banner (id INT AUTO_INCREMENT NOT NULL, message VARCHAR(500) DEFAULT NULL, is_active TINYINT(1) DEFAULT 0 NOT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function postUp(Schema $schema): void
    {
        // Singleton : crée la ligne si elle n'existe pas encore
        if (!$this->connection->fetchOne('SELECT id FROM site_banner LIMIT 1')) {
            $this->connection->executeStatement(
                "INSERT INTO site_banner (message, is_active, updated_at) VALUES (NULL, 0, NULL)"
            );
        }
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE site_banner');
    }
}
