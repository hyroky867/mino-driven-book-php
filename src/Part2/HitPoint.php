<?php

declare(strict_types=1);

namespace App\Part2;

use InvalidArgumentException;

class HitPoint
{
    private const MIN = 0;
    private const MAX = 999;
    public readonly int $value;

    final public function __construct(int $value)
    {
        if ($value < self::MIN) {
            throw new InvalidArgumentException(message: self::MIN . '以上を指定してください');
        }
        if (self::MAX < $value) {
            throw new InvalidArgumentException(message: self::MAX . '以下を指定してください');
        }
        $this->value = $value;
    }

    /** ダメージを受ける */
    public function damage(int $damageAmount): HitPoint
    {
        $damaged = $this->value - $damageAmount;
        $corrected = $damaged < self::MIN ? self::MIN : $damaged;
        return new HitPoint(value: $corrected);
    }

    /** 回復する */
    public function recover(int $recoveryAmount): HitPoint
    {
        $recovered = $this->value + $recoveryAmount;
        $corrected = self::MAX < $recovered ? self::MAX : $recovered;
        return new HitPoint(value: $corrected);
    }
}
