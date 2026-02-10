<?php

namespace ContainerLdVQ3CC;
include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-bundle/Security/TwoFactor/Provider/TwoFactorFormRendererInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-bundle/Security/TwoFactor/Provider/DefaultTwoFactorFormRenderer.php';

class DefaultTwoFactorFormRendererGhost3ca88ab extends \Scheb\TwoFactorBundle\Security\TwoFactor\Provider\DefaultTwoFactorFormRenderer implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyGhostTrait;

    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'template' => [parent::class, 'template', null, 530],
        "\0".parent::class."\0".'templateVars' => [parent::class, 'templateVars', null, 530],
        "\0".parent::class."\0".'twigEnvironment' => [parent::class, 'twigEnvironment', null, 530],
        'template' => [parent::class, 'template', null, 530],
        'templateVars' => [parent::class, 'templateVars', null, 530],
        'twigEnvironment' => [parent::class, 'twigEnvironment', null, 530],
    ];
}

// Help opcache.preload discover always-needed symbols
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('DefaultTwoFactorFormRendererGhost3ca88ab', false)) {
    \class_alias(__NAMESPACE__.'\\DefaultTwoFactorFormRendererGhost3ca88ab', 'DefaultTwoFactorFormRendererGhost3ca88ab', false);
}
