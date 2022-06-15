<?php

declare(strict_types=1);

namespace App\Part6\Chapter2;

class HellFire implements Magic
{
    public function __construct(private readonly Member $member)
    {
    }

    public function name(): string
    {
        return '地獄の業火';
    }

    public function costMagicPoint(): MagicPoint
    {
        return new MagicPoint(value: 16);
    }

    public function attackPower(): AttackPower
    {
        $value = 200 + (int) (($this->member->magicAttack * 0.5) + ($this->member->vitality * 2));
        return new AttackPower(value: $value);
    }

    public function costTechnicalPoint(): TechnicalPoint
    {
        $value = 20 + (int) ($this->member->level * 0.4);
        return new TechnicalPoint(value: $value);
    }
}
