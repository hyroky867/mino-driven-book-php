<?php

declare(strict_types=1);

namespace App\Part8\Chapter1;

use InvalidArgumentException;

class DiscountManager
{
    /** @var array<Product> $discountProducts */
    public array $discountProducts = [];

    public int $totalPrice = 0;

    public function add(
        Product $product,
        ProductDiscount $productDiscount
    ): bool {
        if ($product->id < 0) {
            throw new InvalidArgumentException();
        }
        if ($product->name === '') {
            throw new InvalidArgumentException();
        }
        if ($product->price < 0) {
            throw new InvalidArgumentException();
        }
        if ($product->id !== $productDiscount->id) {
            throw new InvalidArgumentException();
        }

        $discountPrice = self::getDiscountPrice(price: $product->price);
        if ($productDiscount->canDiscount === true) {
            $tmp = $this->totalPrice + $discountPrice;
        } else {
            $tmp = $this->totalPrice + $product->price;
        }

        if ($tmp <= 20000) {
            $this->totalPrice = $tmp;
            $this->discountProducts[] = $product;
            return true;
        } else {
            return false;
        }
    }

    public static function getDiscountPrice(int $price): int
    {
        $discountPrice = $price - 300;
        if ($discountPrice < 0) {
            $discountPrice = 0;
        }
        return $discountPrice;
    }
}
