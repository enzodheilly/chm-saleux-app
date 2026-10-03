<?php

namespace App\Doctrine;

/**
 * Détenteur statique de la clé de chiffrement des données sensibles
 * (adresse, téléphone...), utilisée par EncryptedStringType.
 *
 * Pourquoi statique et pas un service injecté : les types Doctrine
 * personnalisés sont des singletons globaux enregistrés une seule fois pour
 * toute l'application (via doctrine.dbal.types), sans passer par le conteneur
 * de services — ils ne peuvent donc pas recevoir d'injection de dépendances
 * classique. La clé est initialisée une fois au boot du kernel (voir
 * App\Kernel::boot()), à partir de la variable d'environnement
 * DATA_ENCRYPTION_KEY, qui ne doit exister que dans le .env du serveur
 * (jamais dans Git, jamais dans une sauvegarde de la base de données) :
 * c'est précisément ce qui protège ces données en cas de fuite de la base
 * seule.
 */
final class EncryptionKeyProvider
{
    private const CIPHER = 'aes-256-gcm';
    private const IV_LENGTH = 12;
    private const TAG_LENGTH = 16;

    private static ?string $key = null;

    /**
     * @param string $base64Key Clé de 32 octets encodée en base64 (générer avec
     *                           `openssl rand -base64 32`). Une chaîne vide est
     *                           tolérée au boot (clé pas encore configurée) :
     *                           seules les opérations de chiffrement/déchiffrement
     *                           échoueront tant qu'elle ne l'est pas, plutôt que de
     *                           faire planter toutes les pages de l'application.
     */
    public static function setKey(string $base64Key): void
    {
        if ($base64Key === '') {
            self::$key = null;
            return;
        }

        $key = base64_decode($base64Key, true);
        if ($key === false || strlen($key) !== 32) {
            throw new \RuntimeException('DATA_ENCRYPTION_KEY invalide : il faut 32 octets encodés en base64 (ex. généré via "openssl rand -base64 32").');
        }

        self::$key = $key;
    }

    public static function encrypt(string $plaintext): string
    {
        $key = self::requireKey();

        $iv = random_bytes(self::IV_LENGTH);
        $tag = '';
        $ciphertext = openssl_encrypt($plaintext, self::CIPHER, $key, OPENSSL_RAW_DATA, $iv, $tag, '', self::TAG_LENGTH);
        if ($ciphertext === false) {
            throw new \RuntimeException('Échec du chiffrement des données sensibles.');
        }

        return base64_encode($iv . $tag . $ciphertext);
    }

    /**
     * Retourne null plutôt que de lever une exception sur une valeur
     * corrompue ou chiffrée avec une autre clé : une ligne invalide ne doit
     * pas faire planter toute une page de liste admin. L'appelant affiche
     * alors un vide/tiret, ce qui reste visible et investigable.
     */
    public static function decrypt(string $encoded): ?string
    {
        $key = self::requireKey();

        $raw = base64_decode($encoded, true);
        if ($raw === false || strlen($raw) < self::IV_LENGTH + self::TAG_LENGTH) {
            return null;
        }

        $iv = substr($raw, 0, self::IV_LENGTH);
        $tag = substr($raw, self::IV_LENGTH, self::TAG_LENGTH);
        $ciphertext = substr($raw, self::IV_LENGTH + self::TAG_LENGTH);

        $plaintext = openssl_decrypt($ciphertext, self::CIPHER, $key, OPENSSL_RAW_DATA, $iv, $tag);

        return $plaintext === false ? null : $plaintext;
    }

    private static function requireKey(): string
    {
        if (self::$key === null) {
            throw new \RuntimeException('Clé de chiffrement des données sensibles non initialisée (variable d\'environnement DATA_ENCRYPTION_KEY manquante ou vide).');
        }

        return self::$key;
    }
}
