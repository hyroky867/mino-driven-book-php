<?php

declare(strict_types=1);

namespace App\Part8\Chapter2;

class RegularDiscount extends DiscountBase
{
    public function __construct(protected int $price)
    {
    }

    public function getDiscountedPrice(): int
    {
        $discountedPrice = $this->price - 400;
        if ($discountedPrice < 0) {
            $discountedPrice = 0;
        }
        return $discountedPrice;
    }
}
