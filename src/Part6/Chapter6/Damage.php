<?php

declare(strict_types=1);

namespace App\Part6\Chapter6;

interface Damage
{
    public function execute(int $damageAmount): void;
}
