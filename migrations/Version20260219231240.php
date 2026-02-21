<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260219231240 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, published_at DATETIME NOT NULL, description LONGTEXT DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, INDEX IDX_23A0E6612469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(150) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE athlete (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(100) NOT NULL, last_name VARCHAR(100) NOT NULL, birth_date DATE DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, points INT DEFAULT 0 NOT NULL, weight_class VARCHAR(50) DEFAULT NULL, category VARCHAR(50) DEFAULT NULL, gender VARCHAR(10) NOT NULL, INDEX idx_athlete_name (last_name, first_name), UNIQUE INDEX uniq_athlete_identity (first_name, last_name, birth_date), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE blocked_ip (id INT AUTO_INCREMENT NOT NULL, ip VARCHAR(45) NOT NULL, reason VARCHAR(255) DEFAULT NULL, blocked_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competition (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, event_date DATETIME NOT NULL, team_ranking VARCHAR(10) DEFAULT NULL, location VARCHAR(255) DEFAULT NULL, gender VARCHAR(10) DEFAULT NULL, competition_type VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, INDEX idx_competition_event_date (event_date), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competition_athlete (competition_id INT NOT NULL, athlete_id INT NOT NULL, INDEX IDX_DF8E438F7B39D312 (competition_id), INDEX IDX_DF8E438FFE6BCB8B (athlete_id), PRIMARY KEY(competition_id, athlete_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competition_result (id INT AUTO_INCREMENT NOT NULL, competition_id INT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, clean_and_jerk DOUBLE PRECISION NOT NULL, snatch DOUBLE PRECISION NOT NULL, total DOUBLE PRECISION NOT NULL, weight_class VARCHAR(50) DEFAULT NULL, category VARCHAR(255) DEFAULT NULL, points DOUBLE PRECISION DEFAULT NULL, body_weight DOUBLE PRECISION DEFAULT NULL, ranking_level VARCHAR(50) DEFAULT NULL, INDEX IDX_7C2901C07B39D312 (competition_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact_message (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, last_name VARCHAR(100) NOT NULL, first_name VARCHAR(100) NOT NULL, email VARCHAR(150) NOT NULL, phone VARCHAR(20) DEFAULT NULL, subject VARCHAR(150) DEFAULT NULL, content LONGTEXT NOT NULL, response LONGTEXT DEFAULT NULL, resolved_by VARCHAR(255) DEFAULT NULL, is_from_admin TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_2C9211FEA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipment (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, brand VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exercise (id INT AUTO_INCREMENT NOT NULL, equipment_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, muscle_group VARCHAR(50) NOT NULL, INDEX IDX_AEDAD51C517FE9FE (equipment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE legal_page (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(150) NOT NULL, slug VARCHAR(150) NOT NULL, content LONGTEXT NOT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_39715897989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE licence (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, membership_plan_id INT DEFAULT NULL, type VARCHAR(50) NOT NULL, number VARCHAR(20) NOT NULL, benefits JSON NOT NULL, expiry_date DATETIME NOT NULL, first_name VARCHAR(100) NOT NULL, last_name VARCHAR(100) NOT NULL, email VARCHAR(180) NOT NULL, already_associated TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_1DAAE64896901F54 (number), INDEX IDX_1DAAE648A76ED395 (user_id), INDEX IDX_1DAAE648613494CA (membership_plan_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE licence_request (id INT AUTO_INCREMENT NOT NULL, user_email VARCHAR(255) NOT NULL, token VARCHAR(128) NOT NULL, failed_attempts INT NOT NULL, status VARCHAR(20) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', confirmed_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', verification_code VARCHAR(6) DEFAULT NULL, requester_ip VARCHAR(45) DEFAULT NULL, UNIQUE INDEX UNIQ_F520452C5F37A13B (token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE log (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, message LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, user VARCHAR(255) DEFAULT NULL, ip VARCHAR(45) DEFAULT NULL, user_agent LONGTEXT DEFAULT NULL, method VARCHAR(10) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE membership_plan (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, description LONGTEXT DEFAULT NULL, price NUMERIC(10, 2) DEFAULT NULL, monthly_price NUMERIC(10, 2) DEFAULT NULL, billing_period VARCHAR(20) NOT NULL, is_popular TINYINT(1) NOT NULL, benefits JSON NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE merchandise_items (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, price DOUBLE PRECISION NOT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE new_equipment (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, image VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE newsletter_campaign (id INT AUTO_INCREMENT NOT NULL, subject VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, sent_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', recipient_count INT NOT NULL, is_test TINYINT(1) NOT NULL, sent_by VARCHAR(255) DEFAULT NULL, open_count INT DEFAULT 0 NOT NULL, click_count INT DEFAULT 0 NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE newsletter_subscriber (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, confirmation_token VARCHAR(64) DEFAULT NULL, unsubscribe_token VARCHAR(64) NOT NULL, is_confirmed TINYINT(1) NOT NULL, subscribed_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_401562C3E0674361 (unsubscribe_token), UNIQUE INDEX UNIQ_401562C3A76ED395 (user_id), UNIQUE INDEX uniq_newsletter_email (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE password_history (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, password_hash VARCHAR(255) NOT NULL, changed_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_F352144A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE refresh_tokens (id INT AUTO_INCREMENT NOT NULL, refresh_token VARCHAR(128) NOT NULL, username VARCHAR(255) NOT NULL, valid DATETIME NOT NULL, UNIQUE INDEX UNIQ_9BACE7E1C74F2195 (refresh_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE routine_template (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, goal VARCHAR(50) NOT NULL, level VARCHAR(50) NOT NULL, muscle_group VARCHAR(50) NOT NULL, estimated_duration_min INT DEFAULT NULL, is_published TINYINT(1) DEFAULT 1 NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE routine_template_exercise (id INT AUTO_INCREMENT NOT NULL, routine_template_id INT NOT NULL, exercise_id INT NOT NULL, position INT NOT NULL, sets INT NOT NULL, reps_min INT NOT NULL, reps_max INT NOT NULL, rest_seconds INT NOT NULL, rir INT DEFAULT NULL, notes LONGTEXT DEFAULT NULL, INDEX IDX_DB9EB7861CEF45B0 (routine_template_id), INDEX IDX_DB9EB786E934951A (exercise_id), UNIQUE INDEX uniq_template_exercise (routine_template_id, exercise_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE security_log (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, success TINYINT(1) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ip VARCHAR(255) DEFAULT NULL, user_agent VARCHAR(255) DEFAULT NULL, email_attempt VARCHAR(255) DEFAULT NULL, reason VARCHAR(255) DEFAULT NULL, type VARCHAR(100) DEFAULT NULL, message LONGTEXT DEFAULT NULL, os VARCHAR(100) DEFAULT NULL, browser VARCHAR(100) DEFAULT NULL, method VARCHAR(20) DEFAULT NULL, INDEX IDX_FE5C6A69A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, first_name VARCHAR(50) DEFAULT NULL, last_name VARCHAR(50) DEFAULT NULL, roles JSON NOT NULL, backup_codes JSON DEFAULT NULL, password VARCHAR(255) DEFAULT NULL, google_authenticator_secret VARCHAR(255) DEFAULT NULL, is_totp_confirmed TINYINT(1) DEFAULT 0 NOT NULL, is_verified TINYINT(1) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', failed_attempts INT NOT NULL, reset_token VARCHAR(255) DEFAULT NULL, reset_token_expires_at DATETIME DEFAULT NULL, locked_until DATETIME DEFAULT NULL, verification_code VARCHAR(6) DEFAULT NULL, verification_code_expires_at DATETIME DEFAULT NULL, last_login_at DATETIME DEFAULT NULL, last_login_ip VARCHAR(45) DEFAULT NULL, last_reset_request_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', licence_number VARCHAR(50) DEFAULT NULL, licence_type VARCHAR(50) DEFAULT NULL, licence_status VARCHAR(20) DEFAULT \'Inactive\', licence_end_date DATETIME DEFAULT NULL, needs_password TINYINT(1) NOT NULL, profile_image LONGBLOB DEFAULT NULL, phone VARCHAR(20) DEFAULT NULL, phone_verified TINYINT(1) NOT NULL, profile_image_mime VARCHAR(255) DEFAULT NULL, profile_image_updated_at DATETIME DEFAULT NULL, accepted_terms TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_routine (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, day_of_week VARCHAR(15) NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_13FBC6DCA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_routine_exercise (user_routine_id INT NOT NULL, exercise_id INT NOT NULL, INDEX IDX_2DDB72F7551D522B (user_routine_id), INDEX IDX_2DDB72F7E934951A (exercise_id), PRIMARY KEY(user_routine_id, exercise_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE workout_schedule (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, routine_template_id INT NOT NULL, scheduled_date DATE NOT NULL, is_completed TINYINT(1) DEFAULT 0 NOT NULL, INDEX IDX_8249FC4DA76ED395 (user_id), INDEX IDX_8249FC4D1CEF45B0 (routine_template_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE workout_session (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, workout_schedule_id INT DEFAULT NULL, duration_seconds INT DEFAULT NULL, total_volume DOUBLE PRECISION DEFAULT NULL, performed_at DATETIME NOT NULL, INDEX IDX_AC82B97CA76ED395 (user_id), UNIQUE INDEX UNIQ_AC82B97CA90A8CA4 (workout_schedule_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6612469DE2 FOREIGN KEY (category_id) REFERENCES article_category (id)');
        $this->addSql('ALTER TABLE competition_athlete ADD CONSTRAINT FK_DF8E438F7B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competition_athlete ADD CONSTRAINT FK_DF8E438FFE6BCB8B FOREIGN KEY (athlete_id) REFERENCES athlete (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competition_result ADD CONSTRAINT FK_7C2901C07B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contact_message ADD CONSTRAINT FK_2C9211FEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE exercise ADD CONSTRAINT FK_AEDAD51C517FE9FE FOREIGN KEY (equipment_id) REFERENCES equipment (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE licence ADD CONSTRAINT FK_1DAAE648A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE licence ADD CONSTRAINT FK_1DAAE648613494CA FOREIGN KEY (membership_plan_id) REFERENCES membership_plan (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE newsletter_subscriber ADD CONSTRAINT FK_401562C3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE password_history ADD CONSTRAINT FK_F352144A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE routine_template_exercise ADD CONSTRAINT FK_DB9EB7861CEF45B0 FOREIGN KEY (routine_template_id) REFERENCES routine_template (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE routine_template_exercise ADD CONSTRAINT FK_DB9EB786E934951A FOREIGN KEY (exercise_id) REFERENCES exercise (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE security_log ADD CONSTRAINT FK_FE5C6A69A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_routine ADD CONSTRAINT FK_13FBC6DCA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_routine_exercise ADD CONSTRAINT FK_2DDB72F7551D522B FOREIGN KEY (user_routine_id) REFERENCES user_routine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_routine_exercise ADD CONSTRAINT FK_2DDB72F7E934951A FOREIGN KEY (exercise_id) REFERENCES exercise (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE workout_schedule ADD CONSTRAINT FK_8249FC4DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE workout_schedule ADD CONSTRAINT FK_8249FC4D1CEF45B0 FOREIGN KEY (routine_template_id) REFERENCES routine_template (id)');
        $this->addSql('ALTER TABLE workout_session ADD CONSTRAINT FK_AC82B97CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE workout_session ADD CONSTRAINT FK_AC82B97CA90A8CA4 FOREIGN KEY (workout_schedule_id) REFERENCES workout_schedule (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6612469DE2');
        $this->addSql('ALTER TABLE competition_athlete DROP FOREIGN KEY FK_DF8E438F7B39D312');
        $this->addSql('ALTER TABLE competition_athlete DROP FOREIGN KEY FK_DF8E438FFE6BCB8B');
        $this->addSql('ALTER TABLE competition_result DROP FOREIGN KEY FK_7C2901C07B39D312');
        $this->addSql('ALTER TABLE contact_message DROP FOREIGN KEY FK_2C9211FEA76ED395');
        $this->addSql('ALTER TABLE exercise DROP FOREIGN KEY FK_AEDAD51C517FE9FE');
        $this->addSql('ALTER TABLE licence DROP FOREIGN KEY FK_1DAAE648A76ED395');
        $this->addSql('ALTER TABLE licence DROP FOREIGN KEY FK_1DAAE648613494CA');
        $this->addSql('ALTER TABLE newsletter_subscriber DROP FOREIGN KEY FK_401562C3A76ED395');
        $this->addSql('ALTER TABLE password_history DROP FOREIGN KEY FK_F352144A76ED395');
        $this->addSql('ALTER TABLE routine_template_exercise DROP FOREIGN KEY FK_DB9EB7861CEF45B0');
        $this->addSql('ALTER TABLE routine_template_exercise DROP FOREIGN KEY FK_DB9EB786E934951A');
        $this->addSql('ALTER TABLE security_log DROP FOREIGN KEY FK_FE5C6A69A76ED395');
        $this->addSql('ALTER TABLE user_routine DROP FOREIGN KEY FK_13FBC6DCA76ED395');
        $this->addSql('ALTER TABLE user_routine_exercise DROP FOREIGN KEY FK_2DDB72F7551D522B');
        $this->addSql('ALTER TABLE user_routine_exercise DROP FOREIGN KEY FK_2DDB72F7E934951A');
        $this->addSql('ALTER TABLE workout_schedule DROP FOREIGN KEY FK_8249FC4DA76ED395');
        $this->addSql('ALTER TABLE workout_schedule DROP FOREIGN KEY FK_8249FC4D1CEF45B0');
        $this->addSql('ALTER TABLE workout_session DROP FOREIGN KEY FK_AC82B97CA76ED395');
        $this->addSql('ALTER TABLE workout_session DROP FOREIGN KEY FK_AC82B97CA90A8CA4');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_category');
        $this->addSql('DROP TABLE athlete');
        $this->addSql('DROP TABLE blocked_ip');
        $this->addSql('DROP TABLE competition');
        $this->addSql('DROP TABLE competition_athlete');
        $this->addSql('DROP TABLE competition_result');
        $this->addSql('DROP TABLE contact_message');
        $this->addSql('DROP TABLE equipment');
        $this->addSql('DROP TABLE exercise');
        $this->addSql('DROP TABLE legal_page');
        $this->addSql('DROP TABLE licence');
        $this->addSql('DROP TABLE licence_request');
        $this->addSql('DROP TABLE log');
        $this->addSql('DROP TABLE membership_plan');
        $this->addSql('DROP TABLE merchandise_items');
        $this->addSql('DROP TABLE new_equipment');
        $this->addSql('DROP TABLE newsletter_campaign');
        $this->addSql('DROP TABLE newsletter_subscriber');
        $this->addSql('DROP TABLE password_history');
        $this->addSql('DROP TABLE refresh_tokens');
        $this->addSql('DROP TABLE routine_template');
        $this->addSql('DROP TABLE routine_template_exercise');
        $this->addSql('DROP TABLE security_log');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_routine');
        $this->addSql('DROP TABLE user_routine_exercise');
        $this->addSql('DROP TABLE workout_schedule');
        $this->addSql('DROP TABLE workout_session');
    }
}
