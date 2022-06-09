<?php

declare(strict_types=1);

namespace App\Part4;

use InvalidArgumentException;

class AttackPower
{
    private const MIN = 0;

    public function __construct(
        public int $value,
    ) {
        if ($this->value < self::MIN) {
            throw new InvalidArgumentException();
        }
    }
}
