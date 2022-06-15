<?php

declare(strict_types=1);

namespace App\Part6\Chapter6;

class Member
{
    public function __construct(
        public int $hitPoint,
        public int $magicPoint,
    ) {
    }

    public function addState(StateType $state): void
    {
    }
}
