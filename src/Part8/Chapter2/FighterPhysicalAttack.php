<?php

declare(strict_types=1);

namespace App\Part8\Chapter2;

class FighterPhysicalAttack
{
    public function __construct(private readonly PhysicalAttack $physicalAttack)
    {
    }

    public function singleAttackDamage(): int
    {
        return $this->physicalAttack->singleAttackDamage() + 20;
    }

    public function doubleAttackDamage(): int
    {
        return $this->physicalAttack->doubleAttackDamage() + 10;
    }
}
