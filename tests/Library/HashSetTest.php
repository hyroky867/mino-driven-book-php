<?php

declare(strict_types=1);

namespace Test\Library;

use App\Library\HashSet;
use Exception;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use RuntimeException;

class HashSetTest extends TestCase
{
    /** @test */
    public function 同じクラスではない場合、例外が返るべき(): void
    {
        $this->expectException(exception: InvalidArgumentException::class);
        $this->expectExceptionMessage(message: '型が異なります');

        $hash_set = new HashSet(classString: Exception::class);

        $hash_set->add(e: new RuntimeException());
    }

    /** @test */
    public function 同じハッシュのクラスがすでに存在している場合、追加されないべき(): void
    {
        $class_A = new Exception();
        $hash_set = new HashSet(classString: $class_A::class);

        $hash_set->add(e: $class_A);
        $hash_set->add(e: $class_A);

        $this->assertSame(
            expected: 1,
            actual: $hash_set->size(),
        );
    }

    /** @test */
    public function オブジェクトを追加できるべき(): void
    {
        $class_A = new Exception();
        $hash_set = new HashSet(classString: $class_A::class);

        $hash_set->add(e: $class_A);
        $hash_set->add(e: new Exception());

        $this->assertSame(
            expected: 2,
            actual: $hash_set->size(),
        );
    }
}
