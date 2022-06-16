<?php

declare(strict_types=1);

namespace App\Part8\Chapter2;

class RegularDiscount extends DiscountBase
{
    public function __construct(protected int $price)
    {
    }

    protected function discountCharge(): int
    {
        return 400;
    }
}
