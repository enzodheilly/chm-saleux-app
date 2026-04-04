<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AvatarExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('avatar_initials', [$this, 'generateAvatar']),
            new TwigFilter('pseudonymize_email', [$this, 'pseudonymizeEmail']),
        ];
    }

    public function generateAvatar(object $user): string
    {
        $firstname = method_exists($user, 'getFirstname') ? $user->getFirstname() : '';
        $lastname  = method_exists($user, 'getLastname')  ? $user->getLastname()  : '';

        $initials = mb_strtoupper(mb_substr($firstname, 0, 1)) . mb_strtoupper(mb_substr($lastname, 0, 1));

        if ($initials === '') {
            $initials = '?';
        }

        $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="256" height="256" viewBox="0 0 256 256">'
            . '<rect width="256" height="256" rx="128" fill="#F57706"/>'
            . '<text x="128" y="128" text-anchor="middle" dominant-baseline="central" '
            . 'font-family="Inter, Arial, sans-serif" font-size="96" font-weight="700" fill="#ffffff">'
            . htmlspecialchars($initials, ENT_XML1)
            . '</text>'
            . '</svg>';

        return 'data:image/svg+xml;base64,' . base64_encode($svg);
    }

    public function pseudonymizeEmail(?string $email): ?string
    {
        if (!$email || !str_contains($email, '@')) {
            return $email;
        }

        [$local, $domain] = explode('@', $email, 2);

        // Récupère le dernier chiffre présent dans la partie locale
        $lastDigit = '';
        preg_match_all('/\d/', $local, $matches);
        if (!empty($matches[0])) {
            $lastDigit = end($matches[0]);
        }

        $localPseudo = substr($local, 0, 1) . '***' . $lastDigit;

        $domainParts = explode('.', $domain);
        $tld = array_pop($domainParts);
        $domainPseudo = substr(implode('.', $domainParts), 0, 1) . '***.' . $tld;

        return $localPseudo . '@' . $domainPseudo;
    }
}
