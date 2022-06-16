<?php

declare(strict_types=1);

namespace Test\Part8\Chapter2;

use App\Part8\Chapter2\RegularDiscount;
use PHPUnit\Framework\TestCase;

class RegularDiscountTest extends TestCase
{
    /** @test */
    public function 割引価格が最小値よりも低い場合、最小値が割引価格になるべき(): void
    {
        $discount = new RegularDiscount(price: 399);

        $actual = $discount->getDiscountedPrice();

        $this->assertSame(
            expected: 0,
            actual: $actual,
        );
    }

    /** @test */
    public function 割引価格が最小値よりも高い場合、計算された値が割引価格になるべき(): void
    {
        $discount = new RegularDiscount(price: 401);

        $actual = $discount->getDiscountedPrice();

        $this->assertSame(
            expected: 1,
            actual: $actual,
        );
    }
}
