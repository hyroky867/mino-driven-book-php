<?php

declare(strict_types=1);

namespace App\Part6;

class Fire implements Magic
{
    public function __construct(private readonly Member $member)
    {
    }

    public function name(): string
    {
        return 'ファイア';
    }

    public function costMagicPoint(): int
    {
        return 2;
    }

    public function attackPower(): int
    {
        return 20 + (int) ($this->member->level * 0.5);
    }

    public function costTechnicalPoint(): int
    {
        return 0;
    }
}
