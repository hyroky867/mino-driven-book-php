<?php

declare(strict_types=1);

namespace Test\Part9\Chapter3;

use App\Part9\Chapter3\ReadingPoint;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class ReadingPointTest extends TestCase
{
    /** @test */
    public function 値が0よりも小さい場合、例外が返るべき(): void
    {
        $this->expectException(exception: InvalidArgumentException::class);
        $this->expectExceptionMessage(message: '');

        new ReadingPoint(value: -1);
    }

    /** @test */
    public function canTryRead_お試し期間内であれば、trueが返るべき(): void
    {
        $point = new ReadingPoint(value: 60);
        $this->assertTrue(condition: $point->canTryRead());
    }

    /** @test */
    public function canTryRead_お試し期間外であれば、falseが返るべき(): void
    {
        $point = new ReadingPoint(value: 59);
        $this->assertFalse(condition: $point->canTryRead());
    }

    /** @test */
    public function consumeTrial_お試し期間用のインスタンスが生成されるべき(): void
    {
        $initial_value = 100;
        $point = new ReadingPoint(value: $initial_value);
        $actual = $point->consumeTrial();

        $this->assertSame(
            expected: 100 - 60,
            actual: $actual->value,
        );
    }

    /** @test */
    public function add_お試し期間用のインスタンスが生成されるべき(): void
    {
        $initial_value = 100;
        $point = new ReadingPoint(value: $initial_value);

        $increment = 40;
        $actual = $point->add(
            point: new ReadingPoint(value: $increment),
        );

        $this->assertSame(
            expected: $initial_value + $increment,
            actual: $actual->value,
        );
    }
}
