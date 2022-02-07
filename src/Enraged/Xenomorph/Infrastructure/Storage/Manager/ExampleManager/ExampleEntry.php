<?php

namespace Enraged\Xenomorph\Infrastructure\Storage\Manager\ExampleManager;

use DateTimeInterface;
use Money\Money;

class ExampleEntry
{
    protected string $id;
    protected DateTimeInterface $date;
    protected Money $amount;

    public function __construct(string $id, DateTimeInterface $date, Money $amount)
    {
        $this->id = $id;
        $this->date = $date;
        $this->amount = $amount;
    }
}