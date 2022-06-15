<?php

declare(strict_types=1);

namespace App\Part6\Chapter6;

class MagicPointDamage
{
    public function __construct(private readonly Member $member)
    {
    }

    public function execute(int $damageAmount): void
    {
        $this->member->magicPoint -= $damageAmount;
        if (0 < $this->member->magicPoint) {
            return;
        }

        $this->member->magicPoint = 0;
    }
}
