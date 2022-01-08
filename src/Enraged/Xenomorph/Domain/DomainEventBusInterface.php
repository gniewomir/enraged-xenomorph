<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Domain;

use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Stamp\StampInterface;

interface DomainEventBusInterface
{
    /**
     * @param StampInterface[] $stamps
     */
    public function event(object $message, array $stamps = []) : Envelope;
}
