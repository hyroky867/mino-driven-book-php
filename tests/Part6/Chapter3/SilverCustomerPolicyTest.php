<?php

declare(strict_types=1);

namespace Test\Part6\Chapter3;

use App\Part6\Chapter3\PurchaseHistory;
use App\Part6\Chapter3\SilverCustomerPolicy;
use PHPUnit\Framework\TestCase;

class SilverCustomerPolicyTest extends TestCase
{
    private SilverCustomerPolicy $policy;

    protected function setUp(): void
    {
        parent::setUp();
        $this->policy = new SilverCustomerPolicy();
    }

    /** @test */
    public function 購入回数の履歴がルール違反している場合、falseが返るべき(): void
    {
        $frequency = 9;
        $actual = $this->policy->complyWithAll(
            history: new PurchaseHistory(
                totalAmount: 999999,
                purchaseFrequencyPerMonth: $frequency,
                returnRate: 888888,
            ),
        );

        $this->assertFalse(condition: $actual);
    }

    /** @test */
    public function 返品率の履歴がルール違反している場合、falseが返るべき(): void
    {
        $rate = 0.002;
        $actual = $this->policy->complyWithAll(
            history: new PurchaseHistory(
                totalAmount: 999999,
                purchaseFrequencyPerMonth: 888888,
                returnRate: $rate,
            ),
        );

        $this->assertFalse(condition: $actual);
    }

    /** @test */
    public function 履歴がルールを満たしている場合、trueが返るべき(): void
    {
        $actual = $this->policy->complyWithAll(
            history: new PurchaseHistory(
                totalAmount: 999999,
                purchaseFrequencyPerMonth: 888888,
                returnRate: 0.001,
            ),
        );

        $this->assertTrue(condition: $actual);
    }
}
