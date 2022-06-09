<?php

declare(strict_types=1);

namespace App\Part5;

use InvalidArgumentException;

class GiftPoint implements Point
{
    private const STANDARD_MEMBERSHIP_POINT = 3000;
    private const PREMIUM_MEMBERSHIP_POINT  = 10000;

    private function __construct(private readonly int $value)
    {
        if ($this->value < self::MIN_POINT) {
            throw new InvalidArgumentException(message: 'ポイントが0以上ではありません。');
        }
    }

    /** 標準会員向けギフトポイント */
    public static function forStandardMemberShip(): self
    {
        return new GiftPoint(value: self::STANDARD_MEMBERSHIP_POINT);
    }

    /** プレミアム会員向け入会ギフトポイント */
    public static function forPremiumMemberShip(): self
    {
        return new GiftPoint(value: self::PREMIUM_MEMBERSHIP_POINT);
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
