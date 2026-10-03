<?php

namespace App\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

/**
 * Type Doctrine transparent : la propriété PHP reste une chaîne en clair du
 * point de vue du code applicatif (entités, contrôleurs, templates Twig
 * continuent d'utiliser get()/set() normalement), mais la valeur stockée en
 * base est chiffrée (AES-256-GCM, voir EncryptionKeyProvider). Utilisé pour
 * les champs réellement sensibles (adresse, téléphone) isolés dans leurs
 * propres tables "coordonnées".
 *
 * Le chiffrement est non déterministe (IV aléatoire à chaque écriture) : la
 * même valeur donne un texte chiffré différent à chaque fois. C'est voulu
 * (plus sûr), mais ça interdit toute recherche ou tri SQL direct sur ces
 * colonnes (LIKE, =, ORDER BY) — voir DemandeLicenceRepository::findDoublonEnCours()
 * pour comment ce cas est géré (comparaison en PHP après déchiffrement, sur
 * un petit ensemble de lignes).
 */
class EncryptedStringType extends Type
{
    public const NAME = 'encrypted_string';

    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        // Le texte chiffré + encodé en base64 est notablement plus long que
        // la valeur d'origine : TEXT plutôt que VARCHAR pour ne jamais tronquer.
        return $platform->getClobTypeDeclarationSQL($column);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform): ?string
    {
        if ($value === null || $value === '') {
            return null;
        }

        return EncryptionKeyProvider::encrypt((string) $value);
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): ?string
    {
        if ($value === null || $value === '') {
            return null;
        }

        return EncryptionKeyProvider::decrypt((string) $value);
    }

    public function getName(): string
    {
        return self::NAME;
    }

    public function requiresSQLCommentHint(AbstractPlatform $platform): bool
    {
        return true;
    }
}
