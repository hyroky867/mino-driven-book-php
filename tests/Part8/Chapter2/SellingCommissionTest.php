<?php

declare(strict_types=1);

namespace Test\Part8\Chapter2;

use App\Part8\Chapter2\SellingCommission;
use App\Part8\Chapter2\SellingPrice;
use PHPUnit\Framework\TestCase;

class SellingCommissionTest extends TestCase
{
    /** @test */
    public function 正しく計算されるべき(): void
    {
        $commission = new SellingCommission(
            sellingPrice: new SellingPrice(amount: 100),
        );

        $this->assertSame(
            expected: 5,
            actual: $commission->amount,
        );
    }
}
