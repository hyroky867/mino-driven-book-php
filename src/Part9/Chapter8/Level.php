<?php

declare(strict_types=1);

namespace App\Part9\Chapter8;

use InvalidArgumentException;

class Level
{
    private const MIN = 1;
    private const MAX = 99;

    private function __construct(public readonly int $value)
    {
        if ($this->value < self::MIN || self::MAX < $this->value) {
            throw new InvalidArgumentException();
        }
    }

    // 初期レベルを返す
    public static function initialize(): self
    {
        return new self(value: self::MIN);
    }

    // レベルアップする
    public function increase(): self
    {
        if ($this->value < self::MAX) {
            return new self(
                value: ($this->value + 1),
            );
        }
        return $this;
    }
}
