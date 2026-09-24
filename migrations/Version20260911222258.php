<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260911222258 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Crée site_banner_message (multi-messages) et migre le message existant de site_banner';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE site_banner_message (
            id INT AUTO_INCREMENT NOT NULL,
            text VARCHAR(500) NOT NULL,
            position INT NOT NULL DEFAULT 0,
            is_active TINYINT(1) NOT NULL DEFAULT 1,
            created_at DATETIME NOT NULL,
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function postUp(Schema $schema): void
    {
        // Migre le message existant de site_banner s'il est non vide
        $existing = $this->connection->fetchAssociative(
            "SELECT message, is_active FROM site_banner WHERE message IS NOT NULL AND TRIM(message) != '' LIMIT 1"
        );

        if ($existing !== false) {
            $this->connection->executeStatement(
                'INSERT INTO site_banner_message (text, position, is_active, created_at) VALUES (?, 0, ?, NOW())',
                [$existing['message'], (int) $existing['is_active']]
            );
        }
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE site_banner_message');
    }
}
