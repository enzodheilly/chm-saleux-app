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
        return self::encryptWithKey($plaintext, self::requireKey());
    }

    /**
     * Retourne null plutôt que de lever une exception sur une valeur
     * corrompue ou chiffrée avec une autre clé : une ligne invalide ne doit
     * pas faire planter toute une page de liste admin. L'appelant affiche
     * alors un vide/tiret, ce qui reste visible et investigable.
     */
    public static function decrypt(string $encoded): ?string
    {
        return self::decryptWithKey($encoded, self::requireKey());
    }

    /**
     * Chiffre avec une clé brute (32 octets) explicite.
     * Utilisé par RotateEncryptionKeyCommand, qui a besoin de chiffrer avec
     * la NOUVELLE clé alors que requireKey() retourne encore l'ancienne.
     */
    public static function encryptWithKey(string $plaintext, string $rawKey): string
    {
        $iv = random_bytes(self::IV_LENGTH);
        $tag = '';
        $ciphertext = openssl_encrypt($plaintext, self::CIPHER, $rawKey, OPENSSL_RAW_DATA, $iv, $tag, '', self::TAG_LENGTH);
        if ($ciphertext === false) {
            throw new \RuntimeException('Échec du chiffrement des données sensibles.');
        }

        return base64_encode($iv . $tag . $ciphertext);
    }

    /**
     * Déchiffre avec une clé brute (32 octets) explicite.
     * Même usage que encryptWithKey() : permet à RotateEncryptionKeyCommand
     * de déchiffrer avec l'ANCIENNE clé sans modifier la clé globale.
     */
    public static function decryptWithKey(string $encoded, string $rawKey): ?string
    {
        $raw = base64_decode($encoded, true);
        if ($raw === false || strlen($raw) < self::IV_LENGTH + self::TAG_LENGTH) {
            return null;
        }

        $iv = substr($raw, 0, self::IV_LENGTH);
        $tag = substr($raw, self::IV_LENGTH, self::TAG_LENGTH);
        $ciphertext = substr($raw, self::IV_LENGTH + self::TAG_LENGTH);

        $plaintext = openssl_decrypt($ciphertext, self::CIPHER, $rawKey, OPENSSL_RAW_DATA, $iv, $tag);

        return $plaintext === false ? null : $plaintext;
    }

    /**
     * Décode une clé base64 en octets bruts et valide sa longueur.
     * Utilisé par RotateEncryptionKeyCommand pour valider les deux clés
     * (ancienne et nouvelle) avant de commencer la rotation.
     */
    public static function decodeKey(string $base64Key): string
    {
        $raw = base64_decode($base64Key, true);
        if ($raw === false || strlen($raw) !== 32) {
            throw new \RuntimeException(sprintf(
                'Clé de chiffrement invalide ("%s…") : il faut 32 octets encodés en base64 (générer avec "openssl rand -base64 32").',
                substr($base64Key, 0, 8)
            ));
        }

        return $raw;
    }

    private static function requireKey(): string
    {
        if (self::$key === null) {
            throw new \RuntimeException('Clé de chiffrement des données sensibles non initialisée (variable d\'environnement DATA_ENCRYPTION_KEY manquante ou vide).');
        }

        return self::$key;
    }
}
