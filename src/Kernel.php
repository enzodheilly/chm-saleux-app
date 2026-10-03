<?php

namespace App;

use App\Doctrine\EncryptionKeyProvider;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    /**
     * Initialise la clé de chiffrement des données sensibles (adresse,
     * téléphone...) avant toute hydratation d'entité Doctrine, y compris en
     * CLI (migrations, commande d'import) — pas seulement pour les requêtes
     * HTTP. Fait ici plutôt que via un service classique : EncryptedStringType
     * est un singleton Doctrine global, sans accès au conteneur de services.
     */
    public function boot(): void
    {
        parent::boot();
        EncryptionKeyProvider::setKey((string) ($_ENV['DATA_ENCRYPTION_KEY'] ?? $_SERVER['DATA_ENCRYPTION_KEY'] ?? ''));
    }
}
