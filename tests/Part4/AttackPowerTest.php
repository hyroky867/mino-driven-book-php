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
}
