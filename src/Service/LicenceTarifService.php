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

    /** Formule Jeune : tarif fixe (pas de dégressivité mensuelle). */
    private const TARIF_JEUNE = 70.0;

    /** Réduction "tarif réduit" appliquée aux formules à tarif fixe. */
    private const REDUCTION_FIXE = 15.0;

    /**
     * Catégories d'âge FFHM pour la formule Compétition (par année de naissance),
     * saison 2025/2026 — voir la page "avantages" du site (tableau des naissances).
     * À décaler d'un an à chaque nouvelle saison.
     * Ordre important : la première plage qui correspond est retenue.
     */
    private const CATEGORIES_COMPETITION = [
        ['label' => 'Benjamin', 'tier' => 'benjamins',       'annee_min' => 2016, 'annee_max' => 2019],
        ['label' => 'Minime',   'tier' => 'benjamins',       'annee_min' => 2013, 'annee_max' => 2015],
        ['label' => 'Cadet 1',  'tier' => 'cadets_juniors',  'annee_min' => 2011, 'annee_max' => 2012],
        ['label' => 'Cadet 2',  'tier' => 'cadets_juniors',  'annee_min' => 2009, 'annee_max' => 2010],
        ['label' => 'Junior',   'tier' => 'cadets_juniors',  'annee_min' => 2006, 'annee_max' => 2008],
        ['label' => 'Sénior',   'tier' => 'seniors',         'annee_min' => null, 'annee_max' => 2005],
    ];

    /** Tarif de la formule Compétition selon la catégorie d'âge (tier ci-dessus). */
    private const TARIFS_COMPETITION = [
        'benjamins'      => 50.0,
        'cadets_juniors' => 75.0,
        'seniors'        => 95.0,
    ];

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

    /**
     * Date de fin de la saison en cours (31 août) pour une date de référence donnée.
     * La saison va du 1er septembre au 31 août suivant.
     */
    public function getFinDeSaison(\DateTimeInterface $reference): \DateTimeImmutable
    {
        $annee = (int) $reference->format('Y');
        $mois  = (int) $reference->format('n');

        $anneeFin = $mois >= 9 ? $annee + 1 : $annee;

        return new \DateTimeImmutable(sprintf('%d-08-31 23:59:59', $anneeFin));
    }

    public function getFormules(): array
    {
        return [
            self::FORMULE_JEUNE       => 'Jeune',
            self::FORMULE_COMPETITION => 'Compétition',
            self::FORMULE_LOISIR      => 'Loisir & Muscu',
        ];
    }

    /**
     * Détermine la catégorie d'âge FFHM (Benjamin, Minime, ..., Sénior) d'un
     * pratiquant pour la formule Compétition, à partir de sa date de naissance.
     * Un pratiquant sans date de naissance connue est classé "Sénior" par
     * défaut (tarif le plus élevé, jamais un sous-tarif non mérité).
     *
     * @return array{label: string, tier: string}
     */
    public function getCategorieCompetition(?\DateTimeInterface $dateNaissance): array
    {
        if ($dateNaissance !== null) {
            $anneeNaissance = (int) $dateNaissance->format('Y');
            foreach (self::CATEGORIES_COMPETITION as $categorie) {
                if ($categorie['annee_min'] !== null && $anneeNaissance < $categorie['annee_min']) {
                    continue;
                }
                if ($categorie['annee_max'] !== null && $anneeNaissance > $categorie['annee_max']) {
                    continue;
                }
                return ['label' => $categorie['label'], 'tier' => $categorie['tier']];
            }
        }

        return ['label' => 'Sénior', 'tier' => 'seniors'];
    }

    /**
     * Un pratiquant né en 2016-2019 (catégorie Benjamin, saison 2025/2026) est
     * éligible à la gratuité "Benjamin" si un parent est déjà licencié au club
     * — voir page "avantages". À décaler d'un an à chaque nouvelle saison, comme
     * CATEGORIES_COMPETITION.
     */
    public function isCategorieBenjamin(?\DateTimeInterface $dateNaissance): bool
    {
        return $dateNaissance !== null && $this->getCategorieCompetition($dateNaissance)['label'] === 'Benjamin';
    }

    /**
     * Calcule le prix de base (avant réduction familiale) pour une formule,
     * une date d'inscription et un éventuel tarif réduit. La date de naissance
     * n'est utilisée (et nécessaire) que pour la formule Compétition, dont le
     * tarif dépend de la catégorie d'âge.
     */
    public function calculerPrixBase(string $formule, \DateTimeInterface $dateInscription, bool $tarifReduit, ?\DateTimeInterface $dateNaissance = null): float
    {
        if ($formule === self::FORMULE_LOISIR) {
            $mois = (int) $dateInscription->format('n');
            [$standard, $reduit] = self::GRILLE_LOISIR[$mois] ?? self::GRILLE_LOISIR[9];
            return $tarifReduit ? $reduit : $standard;
        }

        if ($formule === self::FORMULE_COMPETITION) {
            $tier = $this->getCategorieCompetition($dateNaissance)['tier'];
            $base = self::TARIFS_COMPETITION[$tier];
            return $tarifReduit ? max(0.0, $base - self::REDUCTION_FIXE) : $base;
        }

        return $tarifReduit ? max(0.0, self::TARIF_JEUNE - self::REDUCTION_FIXE) : self::TARIF_JEUNE;
    }

    /** Applique la réduction familiale (rang 1 à 4+) au prix de base. */
    public function appliquerReductionFamiliale(float $prixBase, int $foyerRang): float
    {
        $rang = min(4, max(1, $foyerRang));
        $taux = self::REDUCTION_FAMILLE[$rang];
        return round($prixBase * (1 - $taux), 2);
    }

    /**
     * Calcule le montant final (prix de base + réduction familiale). Si
     * $gratuit est vrai (gratuité Benjamin détectée), retourne 0 directement.
     */
    public function calculerMontant(string $formule, \DateTimeInterface $dateInscription, bool $tarifReduit, int $foyerRang, ?\DateTimeInterface $dateNaissance = null, bool $gratuit = false): float
    {
        if ($gratuit) {
            return 0.0;
        }

        $prixBase = $this->calculerPrixBase($formule, $dateInscription, $tarifReduit, $dateNaissance);
        return $this->appliquerReductionFamiliale($prixBase, $foyerRang);
    }
}
