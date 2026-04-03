<?php

namespace App\Service;

class FaqService
{
    public function __construct(
        private array $faqs
    ) {}

    public function getAll(): array
    {
        return $this->faqs;
    }
}
