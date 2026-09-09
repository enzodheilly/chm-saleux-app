<?php

namespace App\Security;

use App\Entity\User;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAccountStatusException;

class UserChecker implements UserCheckerInterface
{
    public function checkPreAuth(UserInterface $user): void
    {
        if (!$user instanceof User) {
            return;
        }

        if ($user->getDeletedAt() !== null) {
            throw new CustomUserMessageAccountStatusException('Ce compte a été désactivé et est en cours de suppression. Si vous pensez qu\'il s\'agit d\'une erreur, contactez-nous.');
        }

        $lockedUntil = $user->getLockedUntil();
        if ($lockedUntil && $lockedUntil > new \DateTimeImmutable()) {
            throw new CustomUserMessageAccountStatusException('Compte temporairement bloqué. Réessayez plus tard.');
        }
    }

    public function checkPostAuth(UserInterface $user): void
    {
        if (!$user instanceof User) {
            return;
        }

        // ✅ Si le mot de passe est bon mais que l'email n'est pas vérifié
        if (!$user->isVerified()) {
            // Ce message sera récupéré par onAuthenticationFailure dans ton Authenticator
            throw new CustomUserMessageAccountStatusException('Veuillez vérifier votre compte avant de vous connecter.');
        }
    }
}
