<?php

declare(strict_types=1);

namespace App\Part8\Chapter2;

class ShoppingPoint
{
    private const SHOPPING_POINT_RATE = 0.01;

    public readonly int $value;

    public function __construct(SellingPrice $sellingPrice)
    {
        $this->value = (int) ($sellingPrice->amount * self::SHOPPING_POINT_RATE);
    }
}
