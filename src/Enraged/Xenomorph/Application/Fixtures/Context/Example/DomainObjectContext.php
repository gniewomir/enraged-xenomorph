<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Application\Fixtures\Context\Example;

use Enraged\Xenomorph\Application\Command\Example\CreateDomainObjectCommand;
use Enraged\Xenomorph\Application\Infrastructure\BUS\ApplicationCommandBusInterface;
use Enraged\Xenomorph\Application\Infrastructure\Faker\FakerInterface;
use Enraged\Xenomorph\Application\Query\Example\GetDomainObjectQuery;
use Enraged\Xenomorph\Application\Query\Example\Model\DomainObjectModel;
use Enraged\Xenomorph\Application\QueryResult\Example\GetDomainObjectQueryResult;
use InvalidArgumentException;
use LogicException;

class DomainObjectContext
{
    private ?string $id = null;

    public function __construct(
        private FakerInterface $faker,
        private ApplicationCommandBusInterface $application_command_bus,
        private GetDomainObjectQueryResult $get_domain_object_query_result
    ) {
    }

    public function setup() : self
    {
        if ($this->id) {
            throw new LogicException('Context already set up!');
        }
        $this->application_command_bus->command(
            new CreateDomainObjectCommand(
                $this->id = (string) $this->faker->id()
            )
        );

        return $this;
    }

    public function getEntity() : DomainObjectModel
    {
        return ($this->get_domain_object_query_result)(
            new GetDomainObjectQuery($this->id ?? throw new InvalidArgumentException())
        );
    }
}
