<?php

declare(strict_types=1);

namespace Test\Part6\Chapter2;

use App\Part6\Chapter2\Rectangle;
use PHPUnit\Framework\TestCase;

class RectangleTest extends TestCase
{
    /** @test */
    public function area(): void
    {
        $width = 10;
        $height = 20;
        $circle = new Rectangle(
            width: $width,
            height: $height,
        );

        $actual = $circle->area();

        $expected = $height * $width;
        $this->assertSame(
            expected: $expected,
            actual: $actual,
        );
    }
}
