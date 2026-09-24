<?php

namespace App\Twig;

use Symfony\Component\HttpFoundation\RequestStack;
use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;

class PreviewModeExtension extends AbstractExtension implements GlobalsInterface
{
    public function __construct(private readonly RequestStack $requestStack) {}

    public function getGlobals(): array
    {
        try {
            $session = $this->requestStack->getSession();
            $isPreview = (bool) $session->get('_admin_preview_mode', false);
        } catch (\Exception) {
            $isPreview = false;
        }

        return ['is_preview_mode' => $isPreview];
    }
}
