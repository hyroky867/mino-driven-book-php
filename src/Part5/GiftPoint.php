<?php

declare(strict_types=1);

namespace App\Part5;

use InvalidArgumentException;

class GiftPoint implements Point
{
    public function __construct(private readonly int $value)
    {
        if ($this->value < self::MIN_POINT) {
            throw new InvalidArgumentException(message: 'ポイントが0以上ではありません。');
        }
    }

    /** ポイントを加算する */
    public function add(self $other): self
    {
        return new self(
            value: ($this->value + $other->value),
        );
    }

    /** ポイントを消費する */
    public function consume(ConsumptionPoint $point): self
    {
        if ($this->isEnough(point: $point) === false) {
            throw new InvalidArgumentException(message: 'ポイントが不足しています。');
        }
        return new self(
            value: ($this->value - $point->getValue()),
        );
    }

    /** 残余ポイントが消費ポイント以上であればtrue */
    private function isEnough(ConsumptionPoint $point): bool
    {
        return $point->getValue() <= $this->value;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
