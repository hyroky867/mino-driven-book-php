<?php

declare(strict_types=1);

namespace App\Part6\Chapter4;

class RegularRates implements HotelRates
{
    public function fee(): Money
    {
        return new Money(amount: 7000);
    }
}
