<?php

declare(strict_types=1);

namespace App\Part4;

class Weapon
{
    public function __construct(
        public readonly AttackPower $attack_power
    ) {
    }

    /** 武器を強化する */
    public function reinForce(AttackPower $increment): self
    {
        $reinForced = $this->attack_power->reinForce(
            increment: $increment,
        );
        return new self(attack_power: $reinForced);
    }
}
