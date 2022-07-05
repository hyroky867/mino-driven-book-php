<?php

declare(strict_types=1);

namespace App\Part9\Chapter6;

class Member
{
    public function __construct(
        private Equipment $head,
        private Equipment $body,
        private Equipment $arm,
        private int $defence,
    ) {
    }

    /** 防具の防御力を加味した総合防御力を返す */
    public function totalDefence(): int
    {
        $total = $this->defence;
        $total += $this->head->defence;
        $total += $this->body->defence;
        $total += $this->arm->defence;
        return $total;
    }
}
