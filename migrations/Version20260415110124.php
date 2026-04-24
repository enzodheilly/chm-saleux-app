<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260415110124 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE workout_session ADD CONSTRAINT FK_AC82B97C551D522B FOREIGN KEY (user_routine_id) REFERENCES user_routine (id) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_AC82B97C551D522B ON workout_session (user_routine_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX uniq_athlete_identity ON athlete');
        $this->addSql('ALTER TABLE athlete ADD birth_date DATE DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX uniq_athlete_identity ON athlete (first_name, last_name, birth_date)');
        $this->addSql('ALTER TABLE competition_result DROP FOREIGN KEY FK_7C2901C0FE6BCB8B');
        $this->addSql('DROP INDEX IDX_7C2901C0FE6BCB8B ON competition_result');
        $this->addSql('ALTER TABLE competition_result DROP athlete_id');
        $this->addSql('ALTER TABLE workout_session DROP FOREIGN KEY FK_AC82B97C551D522B');
        $this->addSql('DROP INDEX IDX_AC82B97C551D522B ON workout_session');
        $this->addSql('ALTER TABLE workout_session CHANGE user_routine_id routine_id INT DEFAULT NULL');
    }
}
