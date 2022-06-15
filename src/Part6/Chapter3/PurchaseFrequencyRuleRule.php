<?php

declare(strict_types=1);

namespace App\Part6\Chapter3;

/** 購入頻度のルール */
class PurchaseFrequencyRuleRule implements ExcellentCustomerRule
{
    public function ok(PurchaseHistory $history): bool
    {
        return 10 <= $history->purchaseFrequencyPerMonth;
    }
}
