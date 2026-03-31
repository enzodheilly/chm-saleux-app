<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260331084905 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competition_athlete DROP FOREIGN KEY FK_DF8E438F7B39D312');
        $this->addSql('ALTER TABLE competition_athlete DROP FOREIGN KEY FK_DF8E438FFE6BCB8B');
        $this->addSql('DROP TABLE competition_athlete');
        $this->addSql('DROP INDEX idx_competition_event_date ON competition');
        $this->addSql('ALTER TABLE competition ADD description LONGTEXT DEFAULT NULL, CHANGE event_date event_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE team_ranking team_ranking VARCHAR(50) DEFAULT NULL, CHANGE location location VARCHAR(255) NOT NULL, CHANGE competition_type competition_type VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE workout_session DROP FOREIGN KEY FK_AC82B97CA76ED395');
        $this->addSql('ALTER TABLE workout_session ADD CONSTRAINT FK_AC82B97CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE competition_athlete (competition_id INT NOT NULL, athlete_id INT NOT NULL, INDEX IDX_DF8E438F7B39D312 (competition_id), INDEX IDX_DF8E438FFE6BCB8B (athlete_id), PRIMARY KEY(competition_id, athlete_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE competition_athlete ADD CONSTRAINT FK_DF8E438F7B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competition_athlete ADD CONSTRAINT FK_DF8E438FFE6BCB8B FOREIGN KEY (athlete_id) REFERENCES athlete (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competition DROP description, CHANGE competition_type competition_type VARCHAR(255) DEFAULT NULL, CHANGE location location VARCHAR(255) DEFAULT NULL, CHANGE team_ranking team_ranking VARCHAR(10) DEFAULT NULL, CHANGE event_date event_date DATETIME NOT NULL');
        $this->addSql('CREATE INDEX idx_competition_event_date ON competition (event_date)');
        $this->addSql('ALTER TABLE workout_session DROP FOREIGN KEY FK_AC82B97CA76ED395');
        $this->addSql('ALTER TABLE workout_session ADD CONSTRAINT FK_AC82B97CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE CASCADE');
    }
}
