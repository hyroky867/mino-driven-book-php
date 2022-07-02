<?php

declare(strict_types=1);

namespace App\Part8\Chapter1;

use InvalidArgumentException;

class SummerDiscountManager
{
    public function __construct(private readonly DiscountManager $discountManager)
    {
    }

    public function add(Product $product): bool
    {
        if ($product->id < 0) {
            throw new InvalidArgumentException();
        }
        if ($product->name === '') {
            throw new InvalidArgumentException();
        }

        if ($product->canDiscount === true) {
            $tmp = $this->discountManager->totalPrice + $this->discountManager::getDiscountPrice(
                price: $product->price
            );
        } else {
            $tmp = $this->discountManager->totalPrice + $product->price;
        }

        if ($tmp < 30000) {
            $this->discountManager->totalPrice = $tmp;
            $this->discountManager->discountProducts[] = $product;
            return true;
        } else {
            return false;
        }
    }
}
