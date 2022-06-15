<?php

declare(strict_types=1);

namespace App\Library;

use ReflectionClass;
use ReflectionException;

class TypeFactory
{
    private function __construct()
    {
    }

    /**
     * @param class-string $value
     *
     * @throws ReflectionException
     */
    public static function makeFromString(string $value): Type
    {
        $reflection = new ReflectionClass(objectOrClass: $value);
        if ($reflection->isInterface() === true) {
            return new InterfaceType(value: $value);
        }
        return new ClassType(value: $reflection->getName());
    }
}
