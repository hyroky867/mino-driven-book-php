<?php

declare(strict_types=1);

namespace App\Part8\Chapter2;

class SummerDiscount extends DiscountBase
{
    public function __construct(protected int $price)
    {
    }

    public function getDiscountedPrice(): int
    {
        return (int) ($this->price * (1 - 0.05));
    }
}
