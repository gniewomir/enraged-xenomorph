<?php

declare(strict_types=1);

namespace Tests\Enraged\Xenomorph\Context\Infrastructure;

use Enraged\Xenomorph\CalendarInterface;
use Enraged\Xenomorph\Infrastructure\Calendar\InMemoryCalendarInterface;
use RuntimeException;

trait CalendarContextTrait
{
    public function calendar() : InMemoryCalendarInterface
    {
        $calendar = $this->getContainer()->get(CalendarInterface::class);
        if ($calendar instanceof InMemoryCalendarInterface) {
            return $calendar;
        }
        throw new RuntimeException('One does not use live calendar when testing.');
    }
}
