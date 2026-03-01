<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260228143657 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE licence DROP already_associated');
        $this->addSql('ALTER TABLE user DROP licence_number, DROP licence_type, DROP licence_status, DROP licence_end_date');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE licence ADD already_associated TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE user ADD licence_number VARCHAR(50) DEFAULT NULL, ADD licence_type VARCHAR(50) DEFAULT NULL, ADD licence_status VARCHAR(20) DEFAULT \'Inactive\', ADD licence_end_date DATETIME DEFAULT NULL');
    }
}
