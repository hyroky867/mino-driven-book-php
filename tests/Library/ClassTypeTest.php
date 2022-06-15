<?php

declare(strict_types=1);

namespace Test\Library;

use App\Library\ClassType;
use Exception;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use RuntimeException;

class ClassTypeTest extends TestCase
{
    /** @test */
    public function 存在しないクラスだった場合、例外が返るべき(): void
    {
        $this->expectException(exception: InvalidArgumentException::class);
        $this->expectExceptionMessage(message: 'クラス名が存在しません');

        new ClassType(value: 'hoge');
    }

    /** @test */
    public function クラス名が一致する場合、trueが返るべき(): void
    {
        $class = new Exception();
        $type = new ClassType(value: $class::class);

        $actual = $type->isSame(other: $class);

        $this->assertTrue(condition: $actual);
    }

    /** @test */
    public function クラス名が一致しない場合、falseが返るべき(): void
    {
        $class = new Exception();
        $type = new ClassType(value: $class::class);

        $actual = $type->isSame(other: new RuntimeException());

        $this->assertFalse(condition: $actual);
    }
}
