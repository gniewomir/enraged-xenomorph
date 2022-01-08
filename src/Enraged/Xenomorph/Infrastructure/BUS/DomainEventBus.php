<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Infrastructure\BUS;

use Enraged\Xenomorph\Domain\DomainEventBusInterface;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\StampInterface;

class DomainEventBus implements DomainEventBusInterface
{
    protected MessageBusInterface $domain_event_bus;

    public function __construct(MessageBusInterface $domainEventBus)
    {
        $this->domain_event_bus = $domainEventBus;
    }

    /**
     * @param StampInterface[] $stamps
     */
    public function event(object $message, array $stamps = []) : Envelope
    {
        return $this->domain_event_bus->dispatch($message, $stamps);
    }
}
