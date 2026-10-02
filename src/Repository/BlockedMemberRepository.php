<?php

namespace App\Repository;

use App\Entity\BlockedMember;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BlockedMember>
 */
class BlockedMemberRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BlockedMember::class);
    }

    /**
     * Compare nom + prénom en ignorant casse, accents et espaces superflus.
     * La table reste petite (quelques entrées) : on normalise en PHP plutôt que
     * de dépendre de la collation MySQL, qui ne gère pas toujours les accents
     * de façon homogène selon le champ saisi par l'adhérent.
     */
    public function isBlocked(string $nom, string $prenom): bool
    {
        $nomNormalise = self::normalise($nom);
        $prenomNormalise = self::normalise($prenom);

        if ($nomNormalise === '' || $prenomNormalise === '') {
            return false;
        }

        foreach ($this->findAll() as $blocked) {
            if (self::normalise($blocked->getNom()) === $nomNormalise
                && self::normalise($blocked->getPrenom()) === $prenomNormalise
            ) {
                return true;
            }
        }

        return false;
    }

    /** @return BlockedMember[] */
    public function findAllOrdered(): array
    {
        return $this->createQueryBuilder('b')
            ->orderBy('b.blockedAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    private static function normalise(string $value): string
    {
        $value = trim($value);
        $transliterated = transliterator_transliterate('Any-Latin; Latin-ASCII; Lower()', $value);
        $value = $transliterated !== false ? $transliterated : mb_strtolower($value);

        return trim((string) preg_replace('/\s+/', ' ', $value));
    }
}
