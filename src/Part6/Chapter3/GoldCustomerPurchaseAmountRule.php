<?php

declare(strict_types=1);

namespace App\Part6\Chapter3;

/** ゴールド会員の購入金額ルール */
class GoldCustomerPurchaseAmountRule implements ExcellentCustomerRule
{
    public function ok(PurchaseHistory $history): bool
    {
        return 100000 <= $history->totalAmount;
    }
}
