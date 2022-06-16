<?php

declare(strict_types=1);

namespace App\Part8\Chapter1;

use InvalidArgumentException;

class RegularPrice
{
    private const MIN_AMOUNT = 0;

    public function __construct(public readonly int $amount)
    {
        $min_amount = self::MIN_AMOUNT;
        if ($this->amount < self::MIN_AMOUNT) {
            throw new InvalidArgumentException(message: "価格が{$min_amount}以上ではありません。");
        }
    }
}
