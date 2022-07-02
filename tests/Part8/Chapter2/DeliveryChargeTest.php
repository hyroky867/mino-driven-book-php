<?php

declare(strict_types=1);

namespace Test\Part8\Chapter2;

use App\Part8\Chapter2\DeliveryCharge;
use App\Part8\Chapter2\SellingPrice;
use PHPUnit\Framework\TestCase;

class DeliveryChargeTest extends TestCase
{
    /** @test */
    public function calcDeliveryCharge_配送料上限より小さい場合、0が返るべき(): void
    {
        $charge = new DeliveryCharge(
            sellingPrice: new SellingPrice(amount: 2000),
        );

        $this->assertSame(
            expected: 0,
            actual: $charge->amount,
        );
    }

    /** @test */
    public function calcDeliveryCharge_配送料上限より大きい場合、500が返るべき(): void
    {
        $charge = new DeliveryCharge(
            sellingPrice: new SellingPrice(amount: 2001),
        );

        $this->assertSame(
            expected: 0,
            actual: $charge->amount,
        );
    }
}
