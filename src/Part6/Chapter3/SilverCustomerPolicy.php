<?php

declare(strict_types=1);

namespace App\Part6\Chapter3;

/** シルバー会員の方針 */
class SilverCustomerPolicy
{
    private readonly ExcellentCustomerPolicy $policy;

    public function __construct()
    {
        $this->policy = new ExcellentCustomerPolicy();
        $this->policy->add(rule: new PurchaseFrequencyRuleRule());
        $this->policy->add(rule: new ReturnRateRule());
    }

    public function complyWithAll(PurchaseHistory $history): bool
    {
        return $this->policy->complyWithAll(history: $history);
    }
}
