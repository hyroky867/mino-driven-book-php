<?php

declare(strict_types=1);

namespace Test\Part6\Chapter2;

use App\Part6\Chapter2\Circle;
use PHPUnit\Framework\TestCase;

class CircleTest extends TestCase
{
    /** @test */
    public function area(): void
    {
        $radius = 10;
        $circle = new Circle(radius: $radius);

        $actual = $circle->area();

        $expected = $radius * $radius * M_PI;
        $this->assertSame(
            expected: $expected,
            actual: $actual,
        );
    }
}
