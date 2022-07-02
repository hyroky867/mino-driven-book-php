<?php

declare(strict_types=1);

namespace App\Part8\Chapter1;

class RegularDiscountedPrice
{
    private const MIN_AMOUNT      = 0;
    private const DISCOUNT_AMOUNT = 400;
    public readonly int $amount;

    public function __construct(RegularPrice $price)
    {
        $discountedAmount = $price->amount - self::DISCOUNT_AMOUNT;
        if ($discountedAmount < self::MIN_AMOUNT) {
            $discountedAmount = self::MIN_AMOUNT;
        }
        $this->amount = $discountedAmount;
    }
}
