<?php

declare(strict_types=1);

namespace App\Part4;

use InvalidArgumentException;

class AttackPower
{
    private const MIN = 0;

    public function __construct(
        public readonly int $value,
    ) {
        if ($this->value < self::MIN) {
            throw new InvalidArgumentException();
        }
    }

    /** 攻撃力を強化する */
    public function reinForce(self $increment): self
    {
        return new self(
            value: ($this->value + $increment->value),
        );
    }

    /** 無力化する */
    public function disable(): self
    {
        return new self(value: self::MIN);
    }
}
