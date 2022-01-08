<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Infrastructure\Calendar;

use DateTimeImmutable;
use DateTimeInterface;
use Enraged\Xenomorph\Infrastructure\Assertion\InfrastructureAssertion;

class Calendar implements \Enraged\Xenomorph\Application\Infrastructure\Calendar\ApplicationCalendarInterface, \Enraged\Xenomorph\Domain\DomainCalendarInterface, InfrastructureCalendarInterface
{
    private const ACCEPTED_TIMEZONE = 'UTC';

    public function __construct()
    {
        InfrastructureAssertion::eq(
            date_default_timezone_get(),
            self::ACCEPTED_TIMEZONE,
            'System timezone other than UTC.'
        );
    }

    public function now() : DateTimeInterface
    {
        return new DateTimeImmutable();
    }
}
