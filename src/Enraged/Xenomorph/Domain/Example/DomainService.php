<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Domain\Example;

use Enraged\Xenomorph\Domain\Assertion\DomainAssertion;
use Enraged\Xenomorph\Domain\DomainEventBusInterface;
use Enraged\Xenomorph\Domain\Event\Example\DomainEvent;

/**
 * Autowired as service.
 */
class DomainService
{
    public function __construct(
        private DomainObjectInterface $domain_object,
        private DomainEventBusInterface $domain_event_bus,
        private IdDoNotExistSpecification $id_do_not_exist_specification
    ) {
    }

    public function doSomething(DomainObject $domain_object) : void
    {
        DomainAssertion::false($this->id_do_not_exist_specification->isSatisfiedBy($domain_object->id()));
        $this->domain_object->persist($domain_object);
        $this->domain_event_bus->event(new DomainEvent());
    }
}
