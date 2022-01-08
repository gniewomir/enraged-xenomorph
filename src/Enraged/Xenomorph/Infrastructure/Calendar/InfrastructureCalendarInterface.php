<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Infrastructure\Calendar;

use DateTimeInterface;

interface InfrastructureCalendarInterface
{
    public function now() : DateTimeInterface;
}
