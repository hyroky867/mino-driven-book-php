<?php

declare(strict_types=1);

namespace Test\Part8\Chapter1;

use App\Part8\Chapter1\RegularPrice;
use App\Part8\Chapter1\SummerDiscountedPrice;
use PHPUnit\Framework\TestCase;

class SummerDiscountedPriceTest extends TestCase
{
    /** @test */
    public function 割引価格が最小値よりも低い場合、最小値が割引価格になるべき(): void
    {
        $actual = new SummerDiscountedPrice(
            price: new RegularPrice(amount: 299),
        );

        $this->assertSame(
            expected: 0,
            actual: $actual->amount
        );
    }

    /** @test */
    public function 割引価格が最小値よりも高い場合、計算された値が割引価格になるべき(): void
    {
        $actual = new SummerDiscountedPrice(
            price: new RegularPrice(amount: 301),
        );

        $this->assertSame(
            expected: 1,
            actual: $actual->amount
        );
    }
}
