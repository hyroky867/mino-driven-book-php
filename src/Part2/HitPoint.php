<?php

declare(strict_types=1);

namespace App\Part2;

use InvalidArgumentException;

class HitPoint
{
    private const MIN = 0;
    private const MAX = 999;

    final public function __construct(public readonly int $value)
    {
        if ($this->value < self::MIN) {
            throw new InvalidArgumentException(message: self::MIN . '以上を指定してください');
        }
        if (self::MAX < $this->value) {
            throw new InvalidArgumentException(message: self::MAX . '以下を指定してください');
        }
    }

    /** ダメージを受ける */
    public function damage(int $damageAmount): self
    {
        $damaged = $this->value - $damageAmount;
        $corrected = $damaged < self::MIN ? self::MIN : $damaged;
        return new self(value: $corrected);
    }

    /** 回復する */
    public function recover(int $recoveryAmount): self
    {
        $recovered = $this->value + $recoveryAmount;
        $corrected = self::MAX < $recovered ? self::MAX : $recovered;
        return new self(value: $corrected);
    }
}
