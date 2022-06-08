<?php

declare(strict_types=1);

namespace Test\Unit\Part3;

use App\Part3\Currency;
use App\Part3\Money;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

use function get_class;

class MoneyTest extends TestCase
{
    /** @test */
    public function 値がセットできるべき(): void
    {
        $currency = new class implements Currency {
            public function isEquals(Currency $currency): bool
            {
                return true;
            }
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
                public function isEquals(Currency $currency): bool
                {
                    return true;
                }
            },
        );
    }

    /** @test */
    public function add_加算できるべき(): void
    {
        $amount = 10;
        $currency = new class implements Currency {
            public function isEquals(Currency $currency): bool
            {
                return true;
            }
        };
        $money = new Money(
            amount: $amount,
            currency: $currency,
        );

        $other = 2;
        $other_money = new Money(
            amount: $other,
            currency: $currency,
        );

        $actual = $money->add(other: $other_money);

        $expected = $amount + $other;
        $this->assertSame(
            expected: $expected,
            actual: $actual->amount,
        );
    }

    /** @test */
    public function add_通貨が異なる場合、例外が返るべき(): void
    {
        $jpy = new class implements Currency {
            public function isEquals(Currency $currency): bool
            {
                return get_class(object: $this) === get_class(object: $currency);
            }
        };

        $usd = new class implements Currency {
            public function isEquals(Currency $currency): bool
            {
                return get_class(object: $this) === get_class(object: $currency);
            }
        };

        $yen_money = new Money(
            amount: 999999,
            currency: $jpy,
        );
        $dollar = new Money(
            amount: 888888,
            currency: $usd,
        );

        $this->expectException(exception: InvalidArgumentException::class);
        $this->expectExceptionMessage(message: '通貨単位が違います');

        $yen_money->add(other: $dollar);
    }
}
