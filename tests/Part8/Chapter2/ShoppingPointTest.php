<?php

declare(strict_types=1);

namespace Test\Part8\Chapter2;

use App\Part8\Chapter2\SellingPrice;
use App\Part8\Chapter2\ShoppingPoint;
use PHPUnit\Framework\TestCase;

class ShoppingPointTest extends TestCase
{
    /** @test */
    public function 正しく計算されるべき(): void
    {
        $point = new ShoppingPoint(
            sellingPrice: new SellingPrice(amount: 1000),
        );

        $this->assertSame(
            expected: 10,
            actual: $point->value,
        );
    }
}
