<?php

declare(strict_types=1);

namespace App\Library;

interface Type
{
    public function isSame(object $other): bool;
}
