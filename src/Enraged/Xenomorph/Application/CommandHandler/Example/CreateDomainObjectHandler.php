<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Application\CommandHandler\Example;

use Enraged\Xenomorph\Application\Command\Example\CreateDomainObjectCommand;
use Enraged\Xenomorph\Domain\DomainCalendarInterface;
use Enraged\Xenomorph\Domain\Example\DomainObject;
use Enraged\Xenomorph\Domain\Example\DomainObjectInterface;
use Enraged\Xenomorph\Domain\Example\IdDoNotExistSpecification;
use Symfony\Component\Uid\UuidV4;

class CreateDomainObjectHandler
{
    protected DomainObjectInterface $domain_objects;
    protected DomainCalendarInterface $domain_calendar;
    protected IdDoNotExistSpecification $id_do_not_exist_specification;

    public function __construct(
        DomainObjectInterface $domain_objects,
        DomainCalendarInterface $domain_calendar,
        IdDoNotExistSpecification $id_do_not_exist_specification
    ) {
        $this->domain_objects = $domain_objects;
        $this->domain_calendar = $domain_calendar;
        $this->id_do_not_exist_specification = $id_do_not_exist_specification;
    }

    public function __invoke(CreateDomainObjectCommand $command) : void
    {
        $this->domain_objects->persist(
            new DomainObject(
                UuidV4::fromString($command->getId()),
                $this->domain_calendar->now(),
                $this->id_do_not_exist_specification
            )
        );
    }
}
