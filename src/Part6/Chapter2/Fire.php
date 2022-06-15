<?php

declare(strict_types=1);

namespace App\Part6\Chapter2;

class Fire implements Magic
{
    public function __construct(private readonly Member $member)
    {
    }

    public function name(): string
    {
        return 'ファイア';
    }

    public function costMagicPoint(): MagicPoint
    {
        return new MagicPoint(value: 2);
    }

    public function attackPower(): AttackPower
    {
        $value = 20 + (int) ($this->member->level * 0.5);
        return new AttackPower(value: $value);
    }

    public function costTechnicalPoint(): TechnicalPoint
    {
        return new TechnicalPoint(value: 0);
    }
}
