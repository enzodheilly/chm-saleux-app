<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260712102812 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Déplace le QR code d\'accès de User vers Licence (le badge d\'accès suit l\'adhésion, pas le compte app) et repointe check_in sur licence_id. Table check_in vide au moment de la migration, aucune donnée à transférer.';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE check_in DROP FOREIGN KEY FK_90466CF9A76ED395');
        $this->addSql('DROP INDEX IDX_90466CF9A76ED395 ON check_in');
        $this->addSql('DROP INDEX idx_check_in_user_scanned_at ON check_in');
        $this->addSql('ALTER TABLE check_in CHANGE user_id licence_id INT NOT NULL');
        $this->addSql('ALTER TABLE check_in ADD CONSTRAINT FK_90466CF926EF07C9 FOREIGN KEY (licence_id) REFERENCES licence (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_90466CF926EF07C9 ON check_in (licence_id)');
        $this->addSql('CREATE INDEX idx_check_in_licence_scanned_at ON check_in (licence_id, scanned_at)');
        $this->addSql('ALTER TABLE licence ADD qr_code_token VARCHAR(64) DEFAULT NULL, ADD qr_code_updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1DAAE6481BC9050B ON licence (qr_code_token)');
        $this->addSql('DROP INDEX UNIQ_8D93D6491BC9050B ON user');
        $this->addSql('ALTER TABLE user DROP qr_code_token, DROP qr_code_updated_at');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE check_in DROP FOREIGN KEY FK_90466CF926EF07C9');
        $this->addSql('DROP INDEX IDX_90466CF926EF07C9 ON check_in');
        $this->addSql('DROP INDEX idx_check_in_licence_scanned_at ON check_in');
        $this->addSql('ALTER TABLE check_in CHANGE licence_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE check_in ADD CONSTRAINT FK_90466CF9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_90466CF9A76ED395 ON check_in (user_id)');
        $this->addSql('CREATE INDEX idx_check_in_user_scanned_at ON check_in (user_id, scanned_at)');
        $this->addSql('DROP INDEX UNIQ_1DAAE6481BC9050B ON licence');
        $this->addSql('ALTER TABLE licence DROP qr_code_token, DROP qr_code_updated_at');
        $this->addSql('ALTER TABLE user ADD qr_code_token VARCHAR(64) DEFAULT NULL, ADD qr_code_updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D6491BC9050B ON user (qr_code_token)');
    }
}
