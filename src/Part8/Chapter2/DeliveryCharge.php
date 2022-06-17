<?php

declare(strict_types=1);

namespace App\Part8\Chapter2;

class DeliveryCharge
{
    private const DELIVERY_FREE_MIN = 1000;

    public readonly int $amount;

    public function __construct(SellingPrice $sellingPrice)
    {
        $this->amount = self::DELIVERY_FREE_MIN <= $sellingPrice->amount ? 0 : 500;
    }
}
