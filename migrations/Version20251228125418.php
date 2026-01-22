<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251228125418 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE competition_athlete (competition_id INT NOT NULL, athlete_id INT NOT NULL, INDEX IDX_DF8E438F7B39D312 (competition_id), INDEX IDX_DF8E438FFE6BCB8B (athlete_id), PRIMARY KEY(competition_id, athlete_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE competition_athlete ADD CONSTRAINT FK_DF8E438F7B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competition_athlete ADD CONSTRAINT FK_DF8E438FFE6BCB8B FOREIGN KEY (athlete_id) REFERENCES athlete (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competition_athlete DROP FOREIGN KEY FK_DF8E438F7B39D312');
        $this->addSql('ALTER TABLE competition_athlete DROP FOREIGN KEY FK_DF8E438FFE6BCB8B');
        $this->addSql('DROP TABLE competition_athlete');
    }
}
