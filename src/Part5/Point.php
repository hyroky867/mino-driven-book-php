<?php

declare(strict_types=1);

namespace App\Part5;

interface Point
{
    public const MIN_POINT = 0;

    public function getValue(): int;
}
