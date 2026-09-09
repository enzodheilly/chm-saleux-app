<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260909214245 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD deleted_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD scheduled_purge_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE workout_schedule DROP FOREIGN KEY FK_8249FC4DA76ED395');
        $this->addSql('ALTER TABLE workout_schedule ADD CONSTRAINT FK_8249FC4DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE workout_session DROP FOREIGN KEY FK_AC82B97CA76ED395');
        $this->addSql('ALTER TABLE workout_session DROP FOREIGN KEY FK_AC82B97CA90A8CA4');
        $this->addSql('ALTER TABLE workout_session ADD CONSTRAINT FK_AC82B97CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE workout_session ADD CONSTRAINT FK_AC82B97CA90A8CA4 FOREIGN KEY (workout_schedule_id) REFERENCES workout_schedule (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP deleted_at, DROP scheduled_purge_at');
        $this->addSql('ALTER TABLE workout_schedule DROP FOREIGN KEY FK_8249FC4DA76ED395');
        $this->addSql('ALTER TABLE workout_schedule ADD CONSTRAINT FK_8249FC4DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE workout_session DROP FOREIGN KEY FK_AC82B97CA76ED395');
        $this->addSql('ALTER TABLE workout_session DROP FOREIGN KEY FK_AC82B97CA90A8CA4');
        $this->addSql('ALTER TABLE workout_session ADD CONSTRAINT FK_AC82B97CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE workout_session ADD CONSTRAINT FK_AC82B97CA90A8CA4 FOREIGN KEY (workout_schedule_id) REFERENCES workout_schedule (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
