<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260926120000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Ajoute le suivi du paiement HelloAsso sur demandes_licence (checkout intent, token, date de paiement)';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE demandes_licence ADD hello_asso_checkout_intent_id VARCHAR(64) DEFAULT NULL');
        $this->addSql('ALTER TABLE demandes_licence ADD paiement_token VARCHAR(64) DEFAULT NULL');
        $this->addSql('ALTER TABLE demandes_licence ADD date_paiement DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE demandes_licence ADD UNIQUE INDEX UNIQ_DEMANDES_LICENCE_PAIEMENT_TOKEN (paiement_token)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE demandes_licence DROP INDEX UNIQ_DEMANDES_LICENCE_PAIEMENT_TOKEN');
        $this->addSql('ALTER TABLE demandes_licence DROP hello_asso_checkout_intent_id');
        $this->addSql('ALTER TABLE demandes_licence DROP paiement_token');
        $this->addSql('ALTER TABLE demandes_licence DROP date_paiement');
    }
}
