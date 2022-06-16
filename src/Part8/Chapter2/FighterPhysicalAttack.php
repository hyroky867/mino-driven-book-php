<?php

declare(strict_types=1);

namespace App\Part8\Chapter2;

class FighterPhysicalAttack extends PhysicalAttack
{
    public function singleAttackDamage(): int
    {
        return parent::singleAttackDamage() + 20;
    }

    public function doubleAttackDamage(): int
    {
        return parent::doubleAttackDamage() + 10;
    }
}
