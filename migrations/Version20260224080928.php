<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260224080928 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_routine ADD estimated_duration_min INT DEFAULT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', DROP day_of_week');
        $this->addSql('ALTER TABLE user_routine_exercise DROP FOREIGN KEY FK_2DDB72F7551D522B');
        $this->addSql('DROP INDEX IDX_2DDB72F7551D522B ON user_routine_exercise');
        $this->addSql('ALTER TABLE user_routine_exercise ADD id INT AUTO_INCREMENT NOT NULL, ADD exercise_order INT NOT NULL, ADD sets INT NOT NULL, ADD reps INT NOT NULL, ADD rest_sec INT NOT NULL, CHANGE user_routine_id routine_id INT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE user_routine_exercise ADD CONSTRAINT FK_2DDB72F7F27A94C7 FOREIGN KEY (routine_id) REFERENCES user_routine (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_2DDB72F7F27A94C7 ON user_routine_exercise (routine_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_routine ADD day_of_week VARCHAR(15) NOT NULL, DROP estimated_duration_min, DROP created_at');
        $this->addSql('ALTER TABLE user_routine_exercise MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE user_routine_exercise DROP FOREIGN KEY FK_2DDB72F7F27A94C7');
        $this->addSql('DROP INDEX IDX_2DDB72F7F27A94C7 ON user_routine_exercise');
        $this->addSql('DROP INDEX `PRIMARY` ON user_routine_exercise');
        $this->addSql('ALTER TABLE user_routine_exercise ADD user_routine_id INT NOT NULL, DROP id, DROP routine_id, DROP exercise_order, DROP sets, DROP reps, DROP rest_sec');
        $this->addSql('ALTER TABLE user_routine_exercise ADD CONSTRAINT FK_2DDB72F7551D522B FOREIGN KEY (user_routine_id) REFERENCES user_routine (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_2DDB72F7551D522B ON user_routine_exercise (user_routine_id)');
        $this->addSql('ALTER TABLE user_routine_exercise ADD PRIMARY KEY (user_routine_id, exercise_id)');
    }
}
