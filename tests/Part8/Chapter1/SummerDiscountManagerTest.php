<?php

declare(strict_types=1);

namespace Test\Part8\Chapter1;

use App\Part8\Chapter1\DiscountManager;
use App\Part8\Chapter1\Product;
use App\Part8\Chapter1\SummerDiscountManager;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class SummerDiscountManagerTest extends TestCase
{
    private SummerDiscountManager $manager;

    protected function setUp(): void
    {
        parent::setUp();
        $this->manager = new SummerDiscountManager(discountManager: new DiscountManager());
    }

    /** @test */
    public function 商品のIDが0より小さい場合、例外が返るべき(): void
    {
        $this->expectException(exception: InvalidArgumentException::class);
        $this->expectExceptionMessage(message: '');

        $this->manager->add(
            product: new Product(
                id: -1,
                name: 'hoge',
                price: 999999,
                canDiscount: false,
            ),
        );
    }

    /** @test */
    public function 商品の名前が空文字の場合、例外が返るべき(): void
    {
        $this->expectException(exception: InvalidArgumentException::class);
        $this->expectExceptionMessage(message: '');

        $this->manager->add(
            product: new Product(
                id: 999999,
                name: '',
                price: 888888,
                canDiscount: false,
            ),
        );
    }

    /** @test */
    public function 割引のケースで価格が許容される場合、trueが返るべき(): void
    {
        $id = 999999;
        $actual = $this->manager->add(
            product: new Product(
                id: $id,
                name: 'hoge',
                price: 30299,
                canDiscount: true,
            ),
        );

        $this->assertTrue(condition: $actual);
    }

    /** @test */
    public function 割引のケースで価格が許容されない場合、falseが返るべき(): void
    {
        $id = 999999;
        $actual = $this->manager->add(
            product: new Product(
                id: $id,
                name: 'hoge',
                price: 30300,
                canDiscount: true,
            ),
        );

        $this->assertFalse(condition: $actual);
    }

    /** @test */
    public function 割引のないケースで価格が許容される場合、trueが返るべき(): void
    {
        $id = 999999;
        $actual = $this->manager->add(
            product: new Product(
                id: $id,
                name: 'hoge',
                price: 29999,
                canDiscount: false,
            ),
        );

        $this->assertTrue(condition: $actual);
    }

    /** @test */
    public function 割引のないケースで価格が許容されない場合、falseが返るべき(): void
    {
        $id = 999999;
        $actual = $this->manager->add(
            product: new Product(
                id: $id,
                name: 'hoge',
                price: 30000,
                canDiscount: false,
            ),
        );

        $this->assertFalse(condition: $actual);
    }
}
