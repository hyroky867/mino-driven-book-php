<?php

declare(strict_types=1);

namespace Test\Part4;

use App\Part4\AttackPower;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class AttackPowerTest extends TestCase
{
    /** @test */
    public function 値が最小値よりも下回る場合、例外が返るべき(): void
    {
        $this->expectException(exception: InvalidArgumentException::class);
        $this->expectExceptionMessage(message: '');

        new AttackPower(value: -1);
    }

    /** @test */
    public function reinForce_値が増えるべき(): void
    {
        $value = 20;
        $power = new AttackPower(value: $value);

        $increase = 10;
        $power->reinForce(increment: $increase);

        $expected = $value + $increase;
        $this->assertSame(
            expected: $expected,
            actual: $power->value,
        );
    }

    /** @test */
    public function disable_値が最小になるべき(): void
    {
        $value = 20;
        $power = new AttackPower(value: $value);

        $power->disable();

        $this->assertSame(
            expected: 0,
            actual: $power->value,
        );
    }
}
