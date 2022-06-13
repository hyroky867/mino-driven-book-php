<?php

declare(strict_types=1);

namespace App\Part6;

interface Magic
{
    public function name(): string;

    public function costMagicPoint(): MagicPoint;

    public function attackPower(): AttackPower;

    public function costTechnicalPoint(): TechnicalPoint;
}
