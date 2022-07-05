<?php

declare(strict_types=1);

namespace App\Part9\Chapter3;

use InvalidArgumentException;

/** コミックの購読ポイント */
class ReadingPoint
{
    /** @var int ポイントの最小値 */
    private const MIN = 0;

    /** @var int お試し購読の消費ポイント */
    private const TRIAL_READING_POINT = 60;

    public function __construct(public readonly int $value)
    {
        if ($this->value < self::MIN) {
            throw new InvalidArgumentException();
        }
    }

    /** お試し購読可能かどうかを返す。 */
    public function canTryRead(): bool
    {
        return self::TRIAL_READING_POINT <= $this->value;
    }

    /** お試し購読をする。 */
    public function consumeTrial(): self
    {
        return new self(
            value: ($this->value - self::TRIAL_READING_POINT),
        );
    }

    /** 購読ポイントを追加する */
    public function add(self $point): self
    {
        return new self(
            value: ($this->value + $point->value),
        );
    }
}
