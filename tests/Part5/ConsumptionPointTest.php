<?php

declare(strict_types=1);

namespace Test\Part5;

use App\Part5\ConsumptionPoint;
use PHPUnit\Framework\TestCase;

class ConsumptionPointTest extends TestCase
{
    /** @test */
    public function 値をセットでき、取得できるべき(): void
    {
        $value = 999999;
        $point = new ConsumptionPoint(value: $value);

        $this->assertSame(
            expected: $value,
            actual: $point->getValue(),
        );
    }
}
