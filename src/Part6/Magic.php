<?php

declare(strict_types=1);

namespace App\Part6;

interface Magic
{
    public function name(): string;

    public function costMagicPoint(): int;

    public function attackPower(): int;

    public function costTechnicalPoint(): int;
}
