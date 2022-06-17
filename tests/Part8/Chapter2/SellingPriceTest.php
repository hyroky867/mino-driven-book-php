<?php

declare(strict_types=1);

namespace Test\Part8\Chapter2;

use App\Part8\Chapter2\SellingPrice;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class SellingPriceTest extends TestCase
{
    /** @test */
    public function 値が不正な場合、例外が返るべき(): void
    {
        $this->expectException(exception: InvalidArgumentException::class);
        $this->expectExceptionMessage(message: '価格が0以上ではありません。');

        new SellingPrice(amount: -1);
    }
}
