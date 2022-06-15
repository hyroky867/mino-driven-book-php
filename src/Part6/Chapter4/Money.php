<?php

declare(strict_types=1);

namespace App\Part6\Chapter4;

class Money
{
    public function __construct(public readonly int $amount)
    {
    }
}
