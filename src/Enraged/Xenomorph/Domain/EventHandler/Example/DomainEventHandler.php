<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Domain\EventHandler\Example;

use Enraged\Xenomorph\Domain\DomainEventBusInterface;
use Enraged\Xenomorph\Domain\Event\Example\DomainEvent;
use Enraged\Xenomorph\Domain\Example\DomainService;

class DomainEventHandler
{
    protected DomainEventBusInterface $domain_event_bus;
    protected DomainService $domain_service;

    public function __construct(DomainEventBusInterface $domain_event_bus, DomainService $domain_service)
    {
        $this->domain_event_bus = $domain_event_bus;
        $this->domain_service = $domain_service;
    }

    public function __invoke(DomainEvent $domain_event) : void
    {
    }
}
