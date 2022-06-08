<?php

declare(strict_types=1);

namespace Test\Unit\Part2;

use App\Part2\HitPoint;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class HitPointTest extends TestCase
{
    /** @test */
    public function 値が最小値よりも下回る場合、例外が帰るべき(): void
    {
        $value = -1;
        $this->expectException(exception: InvalidArgumentException::class);
        $this->expectExceptionMessage(message: '0以上を指定してください');

        new HitPoint(value: $value);
    }

    /** @test */
    public function 値が最小値よりも上回る場合、例外が帰るべき(): void
    {
        $value = 1000;
        $this->expectException(exception: InvalidArgumentException::class);
        $this->expectExceptionMessage(message: '999以下を指定してください');

        new HitPoint(value: $value);
    }

    /** @test */
    public function 受けたダメージが持っている値よりも小さい場合、計算された値が保持されるべき(): void
    {
        $value = 10;
        $point = new HitPoint(value: $value);

        $damageAmount = 3;
        $actual = $point->damage(damageAmount: $damageAmount);

        $expected = $value - $damageAmount;
        $this->assertSame(
            expected: $expected,
            actual: $actual->value
        );
    }

    /** @test */
    public function 受けたダメージが持っている値よりも大きい場合、最小値が保持されるべき(): void
    {
        $value = 10;
        $point = new HitPoint(value: $value);

        $damageAmount = 100;
        $actual = $point->damage(damageAmount: $damageAmount);

        $expected = 0;
        $this->assertSame(
            expected: $expected,
            actual: $actual->value
        );
    }

    /** @test */
    public function 回復値との合計が最大値よりも小さい場合、計算された値が保持されるべき(): void
    {
        $value = 10;
        $point = new HitPoint(value: $value);

        $recoverAmount = 3;
        $actual = $point->recover(recoveryAmount: $recoverAmount);

        $expected = $value + $recoverAmount;
        $this->assertSame(
            expected: $expected,
            actual: $actual->value
        );
    }

    /** @test */
    public function 回復値が持っている値よりも大きい場合、最小値が保持されるべき(): void
    {
        $value = 10;
        $point = new HitPoint(value: $value);

        $damageAmount = 1000;
        $actual = $point->recover(recoveryAmount: $damageAmount);

        $expected = 999;
        $this->assertSame(
            expected: $expected,
            actual: $actual->value
        );
    }
}
