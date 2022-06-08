<?php

declare(strict_types=1);

namespace App\Part3;

use InvalidArgumentException;

class Money
{
    public function __construct(
        public int $amount,
        public Currency $currency,
    ) {
        if ($this->amount < 0) {
            throw new InvalidArgumentException(message: '金額が0以上ではありません');
        }
    }

    public function add(int $other): void
    {
        $this->amount += $other;
    }
}
