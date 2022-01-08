<?php

declare(strict_types=1);

namespace Tests\Enraged\Xenomorph\Fixtures\Stub\Infrastructure\Calendar;

use DateTimeImmutable;
use DateTimeInterface;
use Enraged\Xenomorph\Application\Infrastructure\Calendar\ApplicationCalendarInterface;
use Enraged\Xenomorph\Domain\DomainCalendarInterface;
use Enraged\Xenomorph\Infrastructure\Calendar\InfrastructureCalendarInterface;

class CalendarStub implements ApplicationCalendarInterface, DomainCalendarInterface, InfrastructureCalendarInterface
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
