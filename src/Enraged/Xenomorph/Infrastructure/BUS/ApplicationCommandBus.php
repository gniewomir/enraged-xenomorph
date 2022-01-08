<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Infrastructure\BUS;

use Enraged\Xenomorph\Application\Infrastructure\BUS\ApplicationCommandBusInterface;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\StampInterface;

class ApplicationCommandBus implements ApplicationCommandBusInterface
{
    protected MessageBusInterface $command_bus;

    public function __construct(MessageBusInterface $applicationCommandBus)
    {
        $this->command_bus = $applicationCommandBus;
    }

    /**
     * @param StampInterface[] $stamps
     */
    public function command(object $message, array $stamps = []) : Envelope
    {
        return $this->command_bus->dispatch($message, $stamps);
    }
}
