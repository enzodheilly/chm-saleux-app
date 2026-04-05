<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260405131152 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE INDEX idx_security_log_created_at ON security_log (created_at)');
        $this->addSql('CREATE INDEX idx_security_log_type ON security_log (type)');
        $this->addSql('CREATE INDEX idx_security_log_ip ON security_log (ip)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX idx_security_log_created_at ON security_log');
        $this->addSql('DROP INDEX idx_security_log_type ON security_log');
        $this->addSql('DROP INDEX idx_security_log_ip ON security_log');
    }
}
