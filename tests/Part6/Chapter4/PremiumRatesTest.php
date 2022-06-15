<?php

declare(strict_types=1);

namespace Test\Part6\Chapter4;

use App\Part6\Chapter4\Money;
use App\Part6\Chapter4\PremiumRates;
use PHPUnit\Framework\TestCase;

class PremiumRatesTest extends TestCase
{
    private PremiumRates $money;

    protected function setUp(): void
    {
        parent::setUp();
        $this->money = new PremiumRates();
    }

    /** @test */
    public function 値を格納でき取得できるべき(): void
    {
        $actual = $this->money->fee();

        $expected = new Money(amount: 12000);
        $this->assertEquals(
            expected: $expected,
            actual: $actual,
        );
    }
}
