<?php

declare(strict_types=1);

namespace Test\Part9\Chapter8;

use App\Part9\Chapter8\Level;
use PHPUnit\Framework\TestCase;

class LevelTest extends TestCase
{
    /** @test */
    public function initialize_初期レベルで返るべき(): void
    {
        $actual = Level::initialize();

        $this->assertSame(
            expected: 1,
            actual: $actual->value,
        );
    }

    /** @test */
    public function increase_値が追加されるべき(): void
    {
        $level = Level::initialize();
        $actual = $level->increase();

        $this->assertSame(
            expected: 2,
            actual: $actual->value,
        );
    }
}
