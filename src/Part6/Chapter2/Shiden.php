<?php

declare(strict_types=1);

namespace App\Part6\Chapter2;

class Shiden implements Magic
{
    public function __construct(private readonly Member $member)
    {
    }

    public function name(): string
    {
        return '紫電';
    }

    public function costMagicPoint(): MagicPoint
    {
        $value = 5 + (int) ($this->member->level * 0.2);
        return new MagicPoint(value: $value);
    }

    public function attackPower(): AttackPower
    {
        $value = 50 + (int) ($this->member->agility * 1.5);
        return new AttackPower(value: $value);
    }

    public function costTechnicalPoint(): TechnicalPoint
    {
        return new TechnicalPoint(value: 5);
    }
}
