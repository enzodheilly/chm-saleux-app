<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260926180000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Supprime le statut de paiement "en_attente" (bascule vers "a_encaisser_club" par défaut)';
    }

    public function up(Schema $schema): void
    {
        // Le défaut "a_encaisser_club" est géré côté entité (PHP) ; ici on corrige
        // uniquement les lignes existantes qui auraient encore l'ancien statut.
        $this->addSql("UPDATE demandes_licence SET statut_paiement = 'a_encaisser_club' WHERE statut_paiement = 'en_attente'");
    }

    public function down(Schema $schema): void
    {
        // Non réversible : on ne sait plus quelles lignes étaient "en_attente" à l'origine.
    }
}
