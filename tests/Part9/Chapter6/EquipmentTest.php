<?php

declare(strict_types=1);

namespace Test\Part9\Chapter6;

use App\Part9\Chapter6\Equipment;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class EquipmentTest extends TestCase
{
    /** @test */
    public function nameが空文字の場合、例外が返るべき(): void
    {
        $this->expectException(exception: InvalidArgumentException::class);
        $this->expectExceptionMessage(message: '無効な名前');

        new Equipment(
            name: '',
            price: 0,
            defence: 0,
            magicDefence: 0
        );
    }

    /** @test */
    public function getEmpty_初期値が設定されたインスタンスが返却されるべき(): void
    {
        $actual = Equipment::getEmpty();

        $this->assertEquals(
            expected: new Equipment(
                name: '装備なし',
                price: 0,
                defence: 0,
                magicDefence: 0,
            ),
            actual: $actual,
        );
    }
}
