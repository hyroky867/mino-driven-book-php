<?php

declare(strict_types=1);

namespace App\Part5;

class ConsumptionPoint implements Point
{
    public function __construct(
        private readonly int $value,
    ) {
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
