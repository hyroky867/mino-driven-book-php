<?php

declare(strict_types=1);

namespace App\Part6\Chapter3;

use App\Library\HashSet;

class ExcellentCustomerPolicy
{
    private readonly HashSet $rules;

    public function __construct()
    {
        $this->rules = new HashSet(classString: ExcellentCustomerRule::class);
    }

    public function add(ExcellentCustomerRule $rule): void
    {
        $this->rules->add(e: $rule);
    }

    public function complyWithAll(PurchaseHistory $history): bool
    {
        foreach ($this->rules->getHashSet() as $each) {
            /** @var ExcellentCustomerRule $each */
            if ($each->ok(history: $history) === false) {
                return false;
            }
        }
        return true;
    }
}
