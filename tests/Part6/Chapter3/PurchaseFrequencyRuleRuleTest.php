<?php

declare(strict_types=1);

namespace Test\Part6\Chapter3;

use App\Part6\Chapter3\PurchaseFrequencyRuleRule;
use App\Part6\Chapter3\PurchaseHistory;
use PHPUnit\Framework\TestCase;

class PurchaseFrequencyRuleRuleTest extends TestCase
{
    private PurchaseFrequencyRuleRule $rule;

    protected function setUp(): void
    {
        parent::setUp();
        $this->rule = new PurchaseFrequencyRuleRule();
    }

    /** @test */
    public function ok_購入頻度を上回る場合、trueが返るべき(): void
    {
        $frequency = 10;
        $actual = $this->rule->ok(
            history: new PurchaseHistory(
                totalAmount: 999999,
                purchaseFrequencyPerMonth: $frequency,
                returnRate: 888888,
            ),
        );

        $this->assertTrue(condition: $actual);
    }

    /** @test */
    public function ok_購入頻度を下回る場合、falseが返るべき(): void
    {
        $frequency = 9;
        $actual = $this->rule->ok(
            history: new PurchaseHistory(
                totalAmount: 999999,
                purchaseFrequencyPerMonth: $frequency,
                returnRate: 888888,
            ),
        );

        $this->assertFalse(condition: $actual);
    }
}
