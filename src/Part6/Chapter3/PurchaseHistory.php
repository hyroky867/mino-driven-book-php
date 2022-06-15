<?php

declare(strict_types=1);

namespace App\Part6\Chapter3;

/** 購入履歴 */
class PurchaseHistory
{
    public function __construct(
        public readonly int $totalAmount,
        public readonly int $purchaseFrequencyPerMonth,
        public readonly float $returnRate,
    ) {
    }
}
