<?php

declare(strict_types=1);

namespace Enraged\Xenomorph;

interface QueryBusInterface
{
    public function query(object $query) : mixed;
}
