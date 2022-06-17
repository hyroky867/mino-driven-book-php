<?php

declare(strict_types=1);

namespace App\Part8\Chapter2;

use InvalidArgumentException;

class SellingPrice
{
    private const SHOPPING_POINT_RATE = 0.01;

    public function __construct(public readonly int $amount)
    {
        $min_amount = 0;
        if ($this->amount < $min_amount) {
            throw new InvalidArgumentException(message: "価格が{$min_amount}以上ではありません。");
        }
    }

    public function calcShoppingPoint(): int
    {
        return (int) ($this->amount * self::SHOPPING_POINT_RATE);
    }
}
