<?php

declare(strict_types=1);

namespace Enraged\Xenomorph;

use DateTimeInterface;

interface CalendarInterface
{
    public function now() : DateTimeInterface;
}
