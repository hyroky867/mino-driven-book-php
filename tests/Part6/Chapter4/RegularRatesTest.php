<?php

declare(strict_types=1);

namespace Test\Part6\Chapter4;

use App\Part6\Chapter4\Money;
use App\Part6\Chapter4\RegularRates;
use PHPUnit\Framework\TestCase;

class RegularRatesTest extends TestCase
{
    private RegularRates $money;

    protected function setUp(): void
    {
        parent::setUp();
        $this->money = new RegularRates();
    }

    /** @test */
    public function fee(): void
    {
        $actual = $this->money->fee();

        $expected = new Money(amount: 7000);
        $this->assertEquals(
            expected: $expected,
            actual: $actual,
        );
    }

    /** @test */
    public function busySeasonFee(): void
    {
        $actual = $this->money->busySeasonFee();

        $expected = new Money(amount: 10000);
        $this->assertEquals(
            expected: $expected,
            actual: $actual,
        );
    }
}
