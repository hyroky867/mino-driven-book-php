<?php

declare(strict_types=1);

namespace App\Part6\Chapter4;

class Money
{
    public function __construct(public readonly int $amount)
    {
    }

    public function add(self $other): self
    {
        return new self(
            amount: $this->amount + $other->amount,
        );
    }
}
