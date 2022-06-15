<?php

declare(strict_types=1);

namespace App\Part8\Chapter1;

class Product
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly int $price,
    ) {
    }
}
