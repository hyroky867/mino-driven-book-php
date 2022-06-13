<?php

declare(strict_types=1);

namespace App\Part6;

class HellFire implements Magic
{
    public function __construct(private readonly Member $member)
    {
    }

    public function name(): string
    {
        return '地獄の業火';
    }

    public function costMagicPoint(): int
    {
        return 16;
    }

    public function attackPower(): int
    {
        return 200 + (int) (($this->member->magicAttack * 0.5) + ($this->member->vitality * 2));
    }

    public function costTechnicalPoint(): int
    {
        return 20 + (int) ($this->member->level * 0.4);
    }
}
