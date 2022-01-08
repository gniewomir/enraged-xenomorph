<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Application\Infrastructure\BUS;

use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Stamp\StampInterface;

interface ApplicationCommandBusInterface
{
    /**
     * @param StampInterface[] $stamps
     */
    public function command(object $message, array $stamps = []) : Envelope;
}
