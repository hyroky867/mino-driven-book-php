<?php

declare(strict_types=1);

namespace Test\Part8\Chapter2;

use App\Part8\Chapter2\SummerDiscount;
use PHPUnit\Framework\TestCase;

class SummerDiscountTest extends TestCase
{
    /** @test */
    public function getDiscountedPrice(): void
    {
        $price = 100;

        $discount = new SummerDiscount(price: $price);
        $actual = $discount->getDiscountedPrice();

        $this->assertSame(
            expected: 95,
            actual: $actual,
        );
    }
}
