<?php

namespace App\Value;

readonly class Money implements \JsonSerializable
{
    public function __construct(public int $amount)
    {
        if ($this->amount < 0) {
            throw new \InvalidArgumentException('Money amount must be positive');
        }
    }

    public function float() : float
    {
        return round($this->amount / 100, 2);
    }

    public function __toString(): string
    {
        return number_format($this->float(), 2, '.', '');
    }

    public function jsonSerialize(): float
    {
        return $this->float();
    }
}