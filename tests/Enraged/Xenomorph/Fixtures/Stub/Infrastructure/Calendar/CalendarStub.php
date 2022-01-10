<?php

declare(strict_types=1);

namespace Tests\Enraged\Xenomorph\Fixtures\Stub\Infrastructure\Calendar;

use DateTimeImmutable;
use DateTimeInterface;
use Enraged\Xenomorph\CalendarInterface;

class CalendarStub implements CalendarInterface
{
    protected ?DateTimeInterface $now;

    public function __construct(DateTimeInterface $now = null)
    {
        $this->now = $now;
    }

    public function now() : DateTimeInterface
    {
        return $this->now ?? new DateTimeImmutable();
    }
}
