<?php

use App\Kernel;

require_once dirname(__DIR__) . '/vendor/autoload_runtime.php';

// ⚡ Définir la locale en français pour les dates
setlocale(LC_TIME, 'fr_FR.UTF-8');

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
