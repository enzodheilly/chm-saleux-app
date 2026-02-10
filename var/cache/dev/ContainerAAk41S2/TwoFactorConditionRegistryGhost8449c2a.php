<?php

namespace ContainerAAk41S2;
include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-bundle/Security/TwoFactor/Condition/TwoFactorConditionRegistry.php';

class TwoFactorConditionRegistryGhost8449c2a extends \Scheb\TwoFactorBundle\Security\TwoFactor\Condition\TwoFactorConditionRegistry implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyGhostTrait;

    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'conditions' => [parent::class, 'conditions', null, 530],
        'conditions' => [parent::class, 'conditions', null, 530],
    ];
}

// Help opcache.preload discover always-needed symbols
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('TwoFactorConditionRegistryGhost8449c2a', false)) {
    \class_alias(__NAMESPACE__.'\\TwoFactorConditionRegistryGhost8449c2a', 'TwoFactorConditionRegistryGhost8449c2a', false);
}
