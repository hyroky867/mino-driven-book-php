<?php

declare(strict_types=1);

namespace Test\Part5;

use App\Part5\ConsumptionPoint;
use App\Part5\GiftPoint;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class GiftPointTest extends TestCase
{
    /** @test */
    public function 値が最小値より下回る場合、例外が返るべき(): void
    {
        $this->expectException(exception: InvalidArgumentException::class);
        $this->expectExceptionMessage(message: 'ポイントが0以上ではありません。');

        new GiftPoint(value: -1);
    }

    /** @test */
    public function add_ポイントが加算されるべき(): void
    {
        $value = 10;
        $point = new GiftPoint(value: $value);

        $increase = 20;
        $actual = $point->add(
            other: new GiftPoint(value: $increase),
        );

        $expected = $value + $increase;
        $this->assertSame(
            expected: $expected,
            actual: $actual->getValue(),
        );
    }

    /** @test */
    public function consume_ポイントが消費されるべき(): void
    {
        $value = 50;
        $point = new GiftPoint(value: $value);

        $decrease = 40;

        $actual = $point->consume(
            point: new ConsumptionPoint(value: $decrease),
        );

        $expected = $value - $decrease;
        $this->assertSame(
            expected: $expected,
            actual: $actual->getValue(),
        );
    }

    /** @test */
    public function consume_消費ポイントよりも低い場合、例外が返るべき(): void
    {
        $this->expectException(exception: InvalidArgumentException::class);
        $this->expectExceptionMessage(message: 'ポイントが不足しています。');

        $point = new GiftPoint(value: 10);

        $point->consume(
            point: new ConsumptionPoint(value: 40),
        );
    }
}
