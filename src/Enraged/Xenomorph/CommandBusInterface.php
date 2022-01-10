<?php

declare(strict_types=1);

namespace Enraged\Xenomorph;

use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Stamp\StampInterface;

interface CommandBusInterface
{
    /**
     * @param StampInterface[] $stamps
     */
    public function command(object $message, array $stamps = []) : Envelope;
}
