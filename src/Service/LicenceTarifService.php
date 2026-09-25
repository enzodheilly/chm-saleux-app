<?php

namespace App\Service;

/**
 * Calcule le montant d'une demande de licence selon :
 *  - la formule choisie (jeune / compétition / loisir & muscu) ;
 *  - le mois d'inscription (dégressivité, uniquement pour la formule loisir) ;
 *  - le tarif réduit (justificatif : carte Génération HDF, carte étudiante, etc.) ;
 *  - la réduction familiale (2e/3e/4e licence et + du même foyer).
 *
 * ⚠️ Grille tarifaire saison 2025/2026, à mettre à jour chaque saison
 * (voir page /tarifs et la page "avantages" du site pour la source).
 */
class LicenceTarifService
{
    public const FORMULE_JEUNE       = 'jeune';
    public const FORMULE_COMPETITION = 'competition';
    public const FORMULE_LOISIR      = 'loisir';

    /** Formules à tarif fixe (pas de dégressivité mensuelle). */
    private const TARIFS_FIXES = [
        self::FORMULE_JEUNE       => 70.0,
        self::FORMULE_COMPETITION => 90.0,
    ];

    /** Réduction "tarif réduit" appliquée aux formules à tarif fixe. */
    private const REDUCTION_FIXE = 15.0;

    /**
     * Grille dégressive mensuelle de la formule Loisir & Muscu.
     * Clé = mois (1 à 12), valeur = [standard, réduit].
     */
    private const GRILLE_LOISIR = [
        9  => [200.0, 185.0], // Septembre
        10 => [200.0, 185.0],
        11 => [200.0, 185.0],
        12 => [200.0, 185.0], // Décembre
        1  => [185.0, 175.0], // Janvier
        2  => [170.0, 160.0], // Février
        3  => [150.0, 140.0], // Mars
        4  => [125.0, 115.0], // Avril
        5  => [100.0, 90.0],  // Mai
        6  => [80.0, 70.0],   // Juin
        7  => [60.0, 50.0],   // Juillet
        8  => [30.0, 30.0],   // Août
    ];

    /** Réduction familiale cumulable selon le rang de la licence dans le foyer. */
    private const REDUCTION_FAMILLE = [
        1 => 0.0,
        2 => 0.10,
        3 => 0.15,
        4 => 0.20, // 4ème licence et plus
    ];

    public function getFormules(): array
    {
        return [
            self::FORMULE_JEUNE       => 'Jeune',
            self::FORMULE_COMPETITION => 'Compétition',
            self::FORMULE_LOISIR      => 'Loisir & Muscu',
        ];
    }

    /**
     * Calcule le prix de base (avant réduction familiale) pour une formule,
     * une date d'inscription et un éventuel tarif réduit.
     */
    public function calculerPrixBase(string $formule, \DateTimeInterface $dateInscription, bool $tarifReduit): float
    {
        if ($formule === self::FORMULE_LOISIR) {
            $mois = (int) $dateInscription->format('n');
            [$standard, $reduit] = self::GRILLE_LOISIR[$mois] ?? self::GRILLE_LOISIR[9];
            return $tarifReduit ? $reduit : $standard;
        }

        $base = self::TARIFS_FIXES[$formule] ?? self::TARIFS_FIXES[self::FORMULE_JEUNE];
        return $tarifReduit ? max(0.0, $base - self::REDUCTION_FIXE) : $base;
    }

    /** Applique la réduction familiale (rang 1 à 4+) au prix de base. */
    public function appliquerReductionFamiliale(float $prixBase, int $foyerRang): float
    {
        $rang = min(4, max(1, $foyerRang));
        $taux = self::REDUCTION_FAMILLE[$rang];
        return round($prixBase * (1 - $taux), 2);
    }

    /** Calcule le montant final (prix de base + réduction familiale). */
    public function calculerMontant(string $formule, \DateTimeInterface $dateInscription, bool $tarifReduit, int $foyerRang): float
    {
        $prixBase = $this->calculerPrixBase($formule, $dateInscription, $tarifReduit);
        return $this->appliquerReductionFamiliale($prixBase, $foyerRang);
    }
}
