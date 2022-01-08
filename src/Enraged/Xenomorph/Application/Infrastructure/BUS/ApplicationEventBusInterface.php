<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Application\Infrastructure\BUS;

use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Stamp\StampInterface;

interface ApplicationEventBusInterface
{
    /**
     * @param StampInterface[] $stamps
     */
    public function event(object $message, array $stamps = []) : Envelope;
}
