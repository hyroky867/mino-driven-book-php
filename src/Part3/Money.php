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

    public function add(self $other): self
    {
        if ($this->currency->isEquals(currency: $other->currency) === false) {
            throw new InvalidArgumentException(message: '通貨単位が違います');
        }

        $added = $this->amount + $other->amount;
        return new self(
            amount: $added,
            currency: $this->currency,
        );
    }
}
