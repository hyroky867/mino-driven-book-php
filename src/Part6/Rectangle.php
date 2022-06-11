<?php

declare(strict_types=1);

namespace App\Part6;

class Rectangle
{
    public function __construct(
        private readonly int|float $width,
        private readonly int|float $height,
    ) {
    }

    public function area(): int|float
    {
        return $this->height * $this->width;
    }
}
