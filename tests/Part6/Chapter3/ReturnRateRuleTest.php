<?php

declare(strict_types=1);

namespace Test\Part6\Chapter3;

use App\Part6\Chapter3\PurchaseHistory;
use App\Part6\Chapter3\ReturnRateRule;
use PHPUnit\Framework\TestCase;

class ReturnRateRuleTest extends TestCase
{
    private ReturnRateRule $rule;

    protected function setUp(): void
    {
        parent::setUp();
        $this->rule = new ReturnRateRule();
    }

    /** @test */
    public function ok_返品率を上回る場合、falseが返るべき(): void
    {
        $rate = 0.002;
        $actual = $this->rule->ok(
            history: new PurchaseHistory(
                totalAmount: 999999,
                purchaseFrequencyPerMonth: 888888,
                returnRate: $rate,
            ),
        );

        $this->assertFalse(condition: $actual);
    }

    /** @test */
    public function ok_返品リグを下回る場合、trueが返るべき(): void
    {
        $rate = 0.001;
        $actual = $this->rule->ok(
            history: new PurchaseHistory(
                totalAmount: 999999,
                purchaseFrequencyPerMonth: 888888,
                returnRate: $rate,
            ),
        );

        $this->assertTrue(condition: $actual);
    }
}
