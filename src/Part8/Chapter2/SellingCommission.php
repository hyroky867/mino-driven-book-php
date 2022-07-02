<?php

declare(strict_types=1);

namespace App\Part8\Chapter2;

/** 販売手数料クラス */
class SellingCommission
{
    private const SELLING_COMMISSION_RATE = 0.05;

    public readonly int $amount;

    public function __construct(SellingPrice $sellingPrice)
    {
        $this->amount = (int) ($sellingPrice->amount * self::SELLING_COMMISSION_RATE);
    }
}
