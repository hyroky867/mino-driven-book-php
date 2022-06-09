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

    /** 攻撃力を強化する */
    public function reinForce(int $increment): void
    {
        $this->value += $increment;
    }

    /** 無力化する */
    public function disable(): void
    {
        $this->value = self::MIN;
    }
}
