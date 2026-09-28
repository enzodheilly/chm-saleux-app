<?php

namespace App\Security;

use Scheb\TwoFactorBundle\Security\TwoFactor\AuthenticationContextInterface;
use Scheb\TwoFactorBundle\Security\TwoFactor\Condition\TwoFactorConditionInterface;

class TwoFactorCondition implements TwoFactorConditionInterface
{
    public function shouldPerformTwoFactorAuthentication(AuthenticationContextInterface $context): bool
    {
        $user = $context->getUser();
        if (!$user) {
            return false;
        }
        $roles = $user->getRoles();
        return in_array('ROLE_STAFF', $roles, true) || in_array('ROLE_SUPER_ADMIN', $roles, true);
    }
}
