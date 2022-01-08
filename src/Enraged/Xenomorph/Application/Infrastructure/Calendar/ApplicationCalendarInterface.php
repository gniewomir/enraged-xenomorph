<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Application\Infrastructure\Calendar;

use DateTimeInterface;

interface ApplicationCalendarInterface
{
    public function now() : DateTimeInterface;
}
