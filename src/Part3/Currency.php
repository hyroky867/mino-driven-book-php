<?php

declare(strict_types=1);

namespace App\Part3;

interface Currency
{
    public function isEquals(Currency $currency): bool;
}
