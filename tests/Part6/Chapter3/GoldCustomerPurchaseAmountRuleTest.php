<?php

declare(strict_types=1);

namespace Test\Part6\Chapter3;

use App\Part6\Chapter3\GoldCustomerPurchaseAmountRule;
use App\Part6\Chapter3\PurchaseHistory;
use PHPUnit\Framework\TestCase;

class GoldCustomerPurchaseAmountRuleTest extends TestCase
{
    private GoldCustomerPurchaseAmountRule $rule;

    protected function setUp(): void
    {
        parent::setUp();
        $this->rule = new GoldCustomerPurchaseAmountRule();
    }

    /** @test */
    public function ok_購入可能金額を上回る場合、trueが返るべき(): void
    {
        $amount = 100000;
        $actual = $this->rule->ok(
            history: new PurchaseHistory(
                totalAmount: $amount,
                purchaseFrequencyPerMonth: 999999,
                returnRate: 888888,
            ),
        );

        $this->assertTrue(condition: $actual);
    }

    /** @test */
    public function ok_購入可能金額を下上回る場合、falseが返るべき(): void
    {
        $amount = 99999;
        $actual = $this->rule->ok(
            history: new PurchaseHistory(
                totalAmount: $amount,
                purchaseFrequencyPerMonth: 999999,
                returnRate: 888888,
            ),
        );

        $this->assertFalse(condition: $actual);
    }
}
