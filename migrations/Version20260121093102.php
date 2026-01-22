<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260121093102 extends AbstractMigration
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
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66BCF5E72D');
        $this->addSql('DROP INDEX IDX_23A0E66BCF5E72D ON article');
        $this->addSql('ALTER TABLE article ADD description LONGTEXT DEFAULT NULL, ADD photo VARCHAR(255) DEFAULT NULL, DROP categorie_id, DROP summary, DROP image');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competition_athlete DROP FOREIGN KEY FK_DF8E438F7B39D312');
        $this->addSql('ALTER TABLE competition_athlete DROP FOREIGN KEY FK_DF8E438FFE6BCB8B');
        $this->addSql('DROP TABLE competition_athlete');
        $this->addSql('ALTER TABLE article ADD categorie_id INT DEFAULT NULL, ADD summary LONGTEXT NOT NULL, ADD image VARCHAR(255) NOT NULL, DROP description, DROP photo');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON UPDATE NO ACTION ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_23A0E66BCF5E72D ON article (categorie_id)');
    }
}
