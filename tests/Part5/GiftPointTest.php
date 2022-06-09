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
    public function add_ポイントが加算されるべき(): void
    {
        $point = GiftPoint::forStandardMemberShip();

        $actual = $point->add(
            other: GiftPoint::forStandardMemberShip(),
        );

        $this->assertSame(
            expected: 3000 + 3000,
            actual: $actual->getValue(),
        );
    }

    /** @test */
    public function consume_ポイントが消費されるべき(): void
    {
        $point = GiftPoint::forPremiumMemberShip();

        $decrease = 4000;
        $actual = $point->consume(
            point: new ConsumptionPoint(value: $decrease),
        );

        $this->assertSame(
            expected: (10000 - $decrease),
            actual: $actual->getValue(),
        );
    }

    /** @test */
    public function consume_消費ポイントよりも低い場合、例外が返るべき(): void
    {
        $this->expectException(exception: InvalidArgumentException::class);
        $this->expectExceptionMessage(message: 'ポイントが不足しています。');

        $point = GiftPoint::forStandardMemberShip();

        $point->consume(
            point: new ConsumptionPoint(value: 4000),
        );
    }
}
