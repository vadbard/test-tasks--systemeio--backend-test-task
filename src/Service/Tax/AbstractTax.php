<?php

namespace App\Service\Tax;

use App\Value\Money;

class AbstractTax implements TaxInterface
{
    public function calculateTax(Money $money): Money
    {
        return new Money($this::RATE_PERCENT / 100 * $money->amount);
    }

    public function getRegexPattern(): string
    {
        return $this::REGEX;
    }

    public function getName(): string
    {
        return $this::NAME;
    }
}