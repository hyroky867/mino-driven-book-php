<?php

declare(strict_types=1);

namespace App\Part9\Chapter6;

use InvalidArgumentException;

class Equipment
{
    public function __construct(
        public readonly string $name,
        public readonly int $price,
        public readonly int $defence,
        public readonly int $magicDefence,
    ) {
        if ($this->name === '') {
            throw new InvalidArgumentException(message: '無効な名前');
        }
    }

    public static function getEmpty(): self
    {
        return new self(
            name: '装備なし',
            price: 0,
            defence: 0,
            magicDefence: 0,
        );
    }
}
