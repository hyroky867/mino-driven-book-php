<?php

declare(strict_types=1);

namespace App\Part6\Chapter3;

/** 返品率のルール */
class ReturnRateRule implements ExcellentCustomerRule
{
    public function ok(PurchaseHistory $history): bool
    {
        return $history->returnRate <= 0.001;
    }
}
