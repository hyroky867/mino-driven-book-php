<?php

declare(strict_types=1);

namespace Test\Part9\Chapter3;

use App\Part9\Chapter3\ComicManager;
use PHPUnit\Framework\TestCase;
use RuntimeException;

class ComicManagerTest extends TestCase
{
    /** @test */
    public function isOk_判定の結果値が下回る場合、falseが返るべき(): void
    {
        $manager = new ComicManager(value: 59);
        $this->assertFalse(condition: $manager->isOk());
    }

    /** @test */
    public function isOk_判定の結果値が上回る場合、falseが返るべき(): void
    {
        $manager = new ComicManager(value: 60);
        $this->assertTrue(condition: $manager->isOk());
    }

    /** @test */
    public function tryConsume_判定の結果値が0を下回る場合、例外が返るべき(): void
    {
        $this->expectException(exception: RuntimeException::class);
        $this->expectExceptionMessage(message: '');

        $manager = new ComicManager(value: 59);
        $manager->tryConsume();
    }

    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function tryConsume_判定の結果値が0を上回る場合、例外が帰らないべき(): void
    {
        $manager = new ComicManager(value: 60);
        $manager->tryConsume();
    }
}
