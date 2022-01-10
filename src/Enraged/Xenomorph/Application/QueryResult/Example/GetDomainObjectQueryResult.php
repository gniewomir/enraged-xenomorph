<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Application\QueryResult\Example;

use Enraged\Xenomorph\Application\Query\Example\GetDomainObjectQuery;
use Enraged\Xenomorph\Application\Query\Example\Model\DomainObjectModel;
use Enraged\Xenomorph\QueryBusInterface;

class GetDomainObjectQueryResult
{
    protected QueryBusInterface $application_query_bus;

    public function __construct(QueryBusInterface $application_query_bus)
    {
        $this->application_query_bus = $application_query_bus;
    }

    public function __invoke(GetDomainObjectQuery $query) : DomainObjectModel
    {
        return $this->application_query_bus->query($query);
    }
}
