<?php

declare(strict_types=1);

namespace Test\Part8\Chapter1;

use App\Part8\Chapter1\DiscountManager;
use App\Part8\Chapter1\Product;
use App\Part8\Chapter1\ProductDiscount;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class DiscountManagerTest extends TestCase
{
    private DiscountManager $manager;

    protected function setUp(): void
    {
        parent::setUp();
        $this->manager = new DiscountManager();
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
            ),
            productDiscount: new ProductDiscount(
                id: 999999,
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
            ),
            productDiscount: new ProductDiscount(
                id: 777777,
                canDiscount: false,
            ),
        );
    }

    /** @test */
    public function 商品の値段が0よりも小さい場合、例外が返るべき(): void
    {
        $this->expectException(exception: InvalidArgumentException::class);
        $this->expectExceptionMessage(message: '');

        $this->manager->add(
            product: new Product(
                id: 999999,
                name: 'hoge',
                price: -1,
            ),
            productDiscount: new ProductDiscount(
                id: 777777,
                canDiscount: false,
            ),
        );
    }

    /** @test */
    public function 商品と割引データのIDが異なる場合、例外が返るべき(): void
    {
        $this->expectException(exception: InvalidArgumentException::class);
        $this->expectExceptionMessage(message: '');

        $this->manager->add(
            product: new Product(
                id: 999999,
                name: 'hoge',
                price: 888888,
            ),
            productDiscount: new ProductDiscount(
                id: 777777,
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
                price: 20300,
            ),
            productDiscount: new ProductDiscount(
                id: $id,
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
                price: 20301,
            ),
            productDiscount: new ProductDiscount(
                id: $id,
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
                price: 20000,
            ),
            productDiscount: new ProductDiscount(
                id: $id,
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
                price: 20001,
            ),
            productDiscount: new ProductDiscount(
                id: $id,
                canDiscount: false,
            ),
        );

        $this->assertFalse(condition: $actual);
    }
}
