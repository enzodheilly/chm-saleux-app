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
        // On peut vérifier ici si le compte est banni par exemple
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
