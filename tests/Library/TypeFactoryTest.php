<?php

declare(strict_types=1);

namespace Test\Library;

use App\Library\ClassType;
use App\Library\InterfaceType;
use App\Library\TypeFactory;
use Exception;
use PHPUnit\Framework\TestCase;
use ReflectionException;
use Throwable;

class TypeFactoryTest extends TestCase
{
    /** @test */
    public function makeFromString_クラス名の場合、ClassTypeのクラスが返るべき(): void
    {
        $className = Exception::class;

        $actual = TypeFactory::makeFromString(value: $className);
        $this->assertInstanceOf(
            expected: ClassType::class,
            actual: $actual,
        );
    }

    /** @test */
    public function makeFromString_インタフェース名の場合、InterfaceTypeのクラスが返るべき(): void
    {
        $interfaceName = Throwable::class;

        $actual = TypeFactory::makeFromString(value: $interfaceName);
        $this->assertInstanceOf(
            expected: InterfaceType::class,
            actual: $actual,
        );
    }

    /** @test */
    public function makeFromString_空文字の場合、例外が返るべき(): void
    {
        $this->expectException(exception: ReflectionException::class);
        $this->expectExceptionMessage(message: 'Class "" does not exist');

        /* @phpstan-ignore-next-line */
        TypeFactory::makeFromString(value: '');
    }
}
