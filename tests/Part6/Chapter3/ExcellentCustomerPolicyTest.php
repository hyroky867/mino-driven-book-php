<?php

declare(strict_types=1);

namespace Test\Part6\Chapter3;

use App\Part6\Chapter3\ExcellentCustomerPolicy;
use App\Part6\Chapter3\GoldCustomerPurchaseAmountRule;
use App\Part6\Chapter3\PurchaseHistory;
use PHPUnit\Framework\TestCase;

class ExcellentCustomerPolicyTest extends TestCase
{
    private ExcellentCustomerPolicy $policy;

    protected function setUp(): void
    {
        parent::setUp();
        $this->policy = new ExcellentCustomerPolicy();
    }

    /** @test */
    public function 購入履歴が正しい場合、trueが返るべき(): void
    {
        $rule = new GoldCustomerPurchaseAmountRule();
        $this->policy->add(rule: $rule);

        $actual = $this->policy->complyWithAll(
            history: new PurchaseHistory(
                totalAmount: 999999,
                purchaseFrequencyPerMonth: 888888,
                returnRate: 777777
            )
        );

        $this->assertTrue(condition: $actual);
    }

    /** @test */
    public function 購入履歴が正しくない場合、falseが返るべき(): void
    {
        $rule = new GoldCustomerPurchaseAmountRule();
        $this->policy->add(rule: $rule);

        $actual = $this->policy->complyWithAll(
            history: new PurchaseHistory(
                totalAmount: 99999,
                purchaseFrequencyPerMonth: 888888,
                returnRate: 777777
            )
        );

        $this->assertFalse(condition: $actual);
    }
}
