<?php

declare(strict_types=1);

namespace App\Library;

use InvalidArgumentException;

use function class_exists;

class ClassType implements Type
{
    public function __construct(private readonly string $value)
    {
        if (class_exists(class: $value) === false) {
            throw new InvalidArgumentException(message: 'クラス名が存在しません');
        }
    }

    public function isSame(object $other): bool
    {
        return $this->value === $other::class;
    }
}
