<?php

declare(strict_types=1);

namespace App\Part9\Chapter3;

use RuntimeException;

class ComicManager
{
    public function __construct(private int $value)
    {
    }

    public function isOk(): bool
    {
        return 60 <= $this->value;
    }

    /**
     * @throws RuntimeException
     */
    public function tryConsume(): void
    {
        $tmp = $this->value - 60;
        if ($tmp < 0) {
            throw new RuntimeException();
        }
        $this->value = $tmp;
    }
}
