<?php

declare(strict_types=1);

namespace Test\Part6\Chapter4;

use App\Part6\Chapter4\Money;
use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
{
    /** @test */
    public function add(): void
    {
        $base = 100;
        $base_money = new Money(amount: $base);

        $increment = 200;
        $actual = $base_money->add(
            other: new Money(amount: $increment),
        );

        $expected = new Money(amount: $base + $increment);

        $this->assertEquals(
            expected: $expected,
            actual: $actual,
        );
    }
}
