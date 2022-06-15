<?php

declare(strict_types=1);

namespace App\Part6\Chapter4;

interface HotelRates
{
    public function fee(): Money;
}
