<?php
// src/Repository/UserRepository.php
namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof User) {
            throw new \LogicException('Expected a User instance.');
        }

        $user->setPassword($newHashedPassword);
        $this->_em->persist($user);
        $this->_em->flush();
    }

    /**
     * Recherche par email insensible à la casse et aux espaces superflus,
     * pour être cohérent avec GoogleAuthenticator (qui normalise déjà
     * l'email reçu de Google) et éviter les doublons de compte liés à une
     * simple différence de casse entre inscription classique et Google.
     */
    public function findOneByEmailCaseInsensitive(string $email): ?User
    {
        return $this->createQueryBuilder('u')
            ->where('LOWER(u.email) = :email')
            ->setParameter('email', mb_strtolower(trim($email)))
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @return User[]
     */
    public function findAccountsDueForPurge(\DateTimeImmutable $now): array
    {
        return $this->createQueryBuilder('u')
            ->where('u.scheduledPurgeAt IS NOT NULL')
            ->andWhere('u.scheduledPurgeAt <= :now')
            ->setParameter('now', $now)
            ->getQuery()
            ->getResult();
    }
}
