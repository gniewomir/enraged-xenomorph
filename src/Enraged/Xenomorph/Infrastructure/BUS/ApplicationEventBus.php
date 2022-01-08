<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Infrastructure\BUS;

use Enraged\Xenomorph\Application\Infrastructure\BUS\ApplicationEventBusInterface;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\StampInterface;

class ApplicationEventBus implements ApplicationEventBusInterface
{
    protected MessageBusInterface $event_bus;

    public function __construct(MessageBusInterface $applicationEventBus)
    {
        $this->event_bus = $applicationEventBus;
    }

    /**
     * @param StampInterface[] $stamps
     */
    public function event(object $message, array $stamps = []) : Envelope
    {
        return $this->event_bus->dispatch($message, $stamps);
    }
}
