<?php

declare(strict_types=1);

namespace Test\Part8\Chapter1;

use App\Part8\Chapter1\RegularPrice;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class RegularPriceTest extends TestCase
{
    /** @test */
    public function 値が不正な場合、例外が返るべき(): void
    {
        $this->expectException(exception: InvalidArgumentException::class);
        $this->expectExceptionMessage(message: '価格が0以上ではありません。');

        new RegularPrice(amount: -1);
    }

    /** @test */
    public function 値をセットでき、取得できるべき(): void
    {
        $amount = 999999;
        $actual = new RegularPrice(amount: $amount);

        $this->assertSame(
            expected: $amount,
            actual: $actual->amount,
        );
    }
}
