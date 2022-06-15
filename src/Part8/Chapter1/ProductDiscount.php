<?php

declare(strict_types=1);

namespace App\Part8\Chapter1;

class ProductDiscount
{
    public function __construct(
        public readonly int $id,
        public readonly bool $canDiscount,
    ) {
    }
}
