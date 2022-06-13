<?php

declare(strict_types=1);

namespace App\Part6;

class Shiden implements Magic
{
    public function __construct(private readonly Member $member)
    {
    }

    public function name(): string
    {
        return '紫電';
    }

    public function costMagicPoint(): int
    {
        return 5 + (int) ($this->member->level * 0.2);
    }

    public function attackPower(): int
    {
        return 50 + (int) ($this->member->agility * 1.5);
    }

    public function costTechnicalPoint(): int
    {
        return 5;
    }
}
