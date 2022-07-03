<?php

declare(strict_types=1);

namespace App\Part9\Chapter6;

class Equipment
{
    public function __construct(
        public readonly string $name,
        public readonly int $price,
        public readonly int $defence,
        public readonly int $magicDefence,
    ) {
    }
}
