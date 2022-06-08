<?php

declare(strict_types=1);

namespace Test\Unit\Part3;

use App\Part3\Currency;
use App\Part3\Money;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
{
    /** @test */
    public function 値がセットできるべき(): void
    {
        $currency = new class implements Currency {
        };

        $amount = 999999;
        $money = new Money(
            amount: $amount,
            currency: $currency
        );

        $this->assertSame(
            expected: $amount,
            actual: $money->amount
        );
        $this->assertSame(
            expected: $currency,
            actual: $money->currency
        );
    }

    /** @test */
    public function 値が正しくない場合、例外が返るべき(): void
    {
        $this->expectException(exception: InvalidArgumentException::class);
        $this->expectExceptionMessage(message: '金額が0以上ではありません');

        $amount = -1;
        new Money(
            amount: $amount,
            currency: new class implements Currency {
            },
        );
    }
}
