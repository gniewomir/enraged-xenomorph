<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Infrastructure\BUS;

use Enraged\Xenomorph\CommandBusInterface;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\StampInterface;

class CommandBus implements CommandBusInterface
{
    protected MessageBusInterface $command_bus;

    public function __construct(MessageBusInterface $commandBus)
    {
        $this->command_bus = $commandBus;
    }

    /**
     * @param StampInterface[] $stamps
     */
    public function command(object $message, array $stamps = []) : Envelope
    {
        return $this->command_bus->dispatch($message, $stamps);
    }
}
