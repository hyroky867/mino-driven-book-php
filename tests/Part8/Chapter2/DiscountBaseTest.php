<?php

declare(strict_types=1);

namespace Test\Part8\Chapter2;

use App\Part8\Chapter2\DiscountBase;
use PHPUnit\Framework\TestCase;

class DiscountBaseTest extends TestCase
{
    /** @test */
    public function 割引価格が最小値よりも低い場合、最小値が割引価格になるべき(): void
    {
        $price = 299;
        $base = new class ($price) extends DiscountBase {
            protected int $price;

            public function __construct(int $price)
            {
                $this->price = $price;
            }
        };

        $actual = $base->getDiscountedPrice();

        $this->assertSame(
            expected: 0,
            actual: $actual,
        );
    }

    /** @test */
    public function 割引価格が最小値よりも高い場合、計算された値が割引価格になるべき(): void
    {
        $price = 301;
        $base = new class ($price) extends DiscountBase {
            protected int $price;

            public function __construct(int $price)
            {
                $this->price = $price;
            }
        };

        $actual = $base->getDiscountedPrice();

        $this->assertSame(
            expected: 1,
            actual: $actual,
        );
    }
}
