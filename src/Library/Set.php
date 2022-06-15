<?php

declare(strict_types=1);

namespace App\Library;

interface Set
{
    public function add(object $e): void;

    public function contains(object $object): bool;

    public function size(): int;
}
