<?php

declare(strict_types=1);

namespace App\Library;

use InvalidArgumentException;

use function interface_exists;

class InterfaceType implements Type
{
    public function __construct(private readonly string $value)
    {
        if (interface_exists(interface: $value) === false) {
            throw new InvalidArgumentException(message: '存在しないインタフェースです');
        }
    }

    public function isSame(object $other): bool
    {
        return $other instanceof $this->value === true;
    }
}
