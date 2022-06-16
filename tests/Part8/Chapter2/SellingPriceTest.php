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

    /** @test */
    public function calcDeliveryCharge_配送料上限より小さい場合、0が返るべき(): void
    {
        $price = new SellingPrice(amount: 1000);

        $actual = $price->calcDeliveryCharge();

        $this->assertSame(
            expected: 0,
            actual: $actual,
        );
    }

    /** @test */
    public function calcDeliveryCharge_配送料上限より大きい場合、500が返るべき(): void
    {
        $price = new SellingPrice(amount: 1001);

        $actual = $price->calcDeliveryCharge();

        $this->assertSame(
            expected: 0,
            actual: $actual,
        );
    }

    /** @test */
    public function calcSellingCommission(): void
    {
        $price = new SellingPrice(amount: 1000);

        $actual = $price->calcSellingCommission();

        $this->assertSame(
            expected: 50,
            actual: $actual,
        );
    }

    /** @test */
    public function calcShoppingPoint(): void
    {
        $price = new SellingPrice(amount: 1000);

        $actual = $price->calcShoppingPoint();

        $this->assertSame(
            expected: 10,
            actual: $actual,
        );
    }
}
