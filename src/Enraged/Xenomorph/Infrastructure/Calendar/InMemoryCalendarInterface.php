<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Infrastructure\Calendar;

use DateInterval;

interface InMemoryCalendarInterface
{
    public function subOffset(DateInterval $offset) : self;

    public function addOffset(DateInterval $offset) : self;

    public function clearOffset() : self;
}
