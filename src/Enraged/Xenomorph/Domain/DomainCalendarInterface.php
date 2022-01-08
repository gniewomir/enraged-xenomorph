<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Domain;

use DateTimeInterface;

interface DomainCalendarInterface
{
    public function now() : DateTimeInterface;
}
