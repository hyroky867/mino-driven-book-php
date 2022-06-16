<?php

declare(strict_types=1);

namespace App\Part8\Chapter2;

abstract class DiscountBase
{
    /** @var int 元値 */
    protected int $price;

    public function getDiscountedPrice(): int
    {
        $discountedPrice = $this->price - 300;
        if ($discountedPrice < 0) {
            $discountedPrice = 0;
        }
        return $discountedPrice;
    }
}
