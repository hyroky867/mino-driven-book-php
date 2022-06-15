<?php

declare(strict_types=1);

namespace App\Part6\Chapter3;

interface ExcellentCustomerRule
{
    public function ok(PurchaseHistory $history): bool;
}
