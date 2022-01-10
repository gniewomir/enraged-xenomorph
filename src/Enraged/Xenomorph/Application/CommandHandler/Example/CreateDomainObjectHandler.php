<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Application\CommandHandler\Example;

use Enraged\Xenomorph\Application\Command\Example\CreateDomainObjectCommand;
use Enraged\Xenomorph\CalendarInterface;
use Enraged\Xenomorph\Domain\Example\DomainObject;
use Enraged\Xenomorph\Domain\Example\DomainObjectInterface;
use Enraged\Xenomorph\Domain\Example\DomainService;
use Enraged\Xenomorph\Domain\Example\IdDoNotExistSpecification;
use Symfony\Component\Uid\UuidV4;

class CreateDomainObjectHandler
{
    public function __construct(
        private DomainObjectInterface $domain_objects,
        private CalendarInterface $calendar,
        private DomainService $domain_service,
        private IdDoNotExistSpecification $id_do_not_exist_specification
    ) {
    }

    public function __invoke(CreateDomainObjectCommand $command) : void
    {
        $this->domain_objects->persist(
            $domain_object = new DomainObject(
                UuidV4::fromString($command->getId()),
                $this->calendar->now(),
                $this->id_do_not_exist_specification
            )
        );
        $this->domain_service->doSomething($domain_object);
    }
}
