<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260201201805 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE security_log ADD user_id INT DEFAULT NULL, ADD success TINYINT(1) DEFAULT NULL, ADD reason VARCHAR(255) DEFAULT NULL, CHANGE user email_attempt VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE security_log ADD CONSTRAINT FK_FE5C6A69A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_FE5C6A69A76ED395 ON security_log (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE security_log DROP FOREIGN KEY FK_FE5C6A69A76ED395');
        $this->addSql('DROP INDEX IDX_FE5C6A69A76ED395 ON security_log');
        $this->addSql('ALTER TABLE security_log ADD user VARCHAR(255) DEFAULT NULL, DROP user_id, DROP success, DROP email_attempt, DROP reason');
    }
}
