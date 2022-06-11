<?php

declare(strict_types=1);

namespace App\Part6;

class Circle implements Shape
{
    public function __construct(private readonly int|float $radius)
    {
    }

    public function area(): int|float
    {
        return $this->radius * $this->radius * M_PI;
    }
}
