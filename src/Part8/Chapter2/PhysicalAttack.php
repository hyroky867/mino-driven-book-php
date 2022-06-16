<?php

declare(strict_types=1);

namespace App\Part8\Chapter2;

class PhysicalAttack
{
    private const DAMAGE = 100;

    public function singleAttackDamage(): int
    {
        return self::DAMAGE;
    }

    public function doubleAttackDamage(): int
    {
        return self::DAMAGE * 2;
    }
}
