<?php

declare(strict_types=1);

namespace App\Part4;

class Weapon
{
    public function __construct(
        public readonly AttackPower $attack_power
    ) {
    }
}
