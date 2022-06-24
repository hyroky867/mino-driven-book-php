<?php

declare(strict_types=1);

namespace App\Part6\Chapter6;

class HitPointDamage implements Damage
{
    public function __construct(private readonly Member $member)
    {
    }

    public function execute(int $damageAmount): void
    {
        $this->member->hitPoint -= $damageAmount;
        if (0 < $this->member->hitPoint) {
            return;
        }

        $this->member->hitPoint = 0;
    }
}
