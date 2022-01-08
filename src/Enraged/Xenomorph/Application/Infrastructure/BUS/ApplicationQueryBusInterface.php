<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Application\Infrastructure\BUS;

interface ApplicationQueryBusInterface
{
    public function query(object $query) : mixed;
}
