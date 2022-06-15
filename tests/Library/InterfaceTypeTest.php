<?php

declare(strict_types=1);

namespace Test\Library;

use App\Library\InterfaceType;
use Exception;
use InvalidArgumentException;
use Iterator;
use PHPUnit\Framework\TestCase;
use RuntimeException;
use Throwable;

class InterfaceTypeTest extends TestCase
{
    /** @test */
    public function 存在しないインタフェースだった場合、例外が返るべき(): void
    {
        $this->expectException(exception: InvalidArgumentException::class);
        $this->expectExceptionMessage(message: '存在しないインタフェースです');

        new InterfaceType(value: 'hoge');
    }

    /** @test */
    public function インタフェース名が一致する場合、trueが返るべき(): void
    {
        $interface = Throwable::class;
        $type = new InterfaceType(value: $interface);

        $actual = $type->isSame(other: new RuntimeException());

        $this->assertTrue(condition: $actual);
    }

    /** @test */
    public function インタフェースが一致しない場合、falseが返るべき(): void
    {
        $interface = Iterator::class;
        $type = new InterfaceType(value: $interface);

        $actual = $type->isSame(other: new Exception());

        $this->assertFalse(condition: $actual);
    }
}
