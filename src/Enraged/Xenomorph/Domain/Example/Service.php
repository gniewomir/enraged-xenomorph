<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Domain\Example;

use Enraged\Xenomorph\Domain\DomainEventBusInterface;

/**
 * Autowired as service.
 */
class Service
{
    protected DomainObjectInterface $domain_object;
    protected DomainEventBusInterface $domain_event_bus;

    public function __construct(DomainObjectInterface $domain_object, DomainEventBusInterface $domain_event_bus)
    {
        $this->domain_object = $domain_object;
        $this->domain_event_bus = $domain_event_bus;
    }
}
