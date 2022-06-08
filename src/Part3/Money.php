<?php

declare(strict_types=1);

namespace App\Part3;

use InvalidArgumentException;

class Money
{
    public function __construct(
        public readonly int $amount,
        public readonly Currency $currency,
    ) {
        if ($this->amount < 0) {
            throw new InvalidArgumentException(message: '金額が0以上ではありません');
        }
    }

    public function add(Money $other): Money
    {
        $added = $this->amount + $other->amount;
        return new Money(
            amount: $added,
            currency: $this->currency,
        );
    }
}
