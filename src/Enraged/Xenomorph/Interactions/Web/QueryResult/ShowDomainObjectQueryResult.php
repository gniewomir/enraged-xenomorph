<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Interactions\Web\QueryResult;

use Enraged\Xenomorph\Interactions\Web\Query\Model\DomainObjectModel;
use Enraged\Xenomorph\Interactions\Web\Query\ShowDomainObjectQuery;
use Enraged\Xenomorph\QueryBusInterface;

class ShowDomainObjectQueryResult
{
    protected QueryBusInterface $query_bus;

    public function __construct(QueryBusInterface $query_bus)
    {
        $this->query_bus = $query_bus;
    }

    public function __invoke(ShowDomainObjectQuery $query) : DomainObjectModel
    {
        return $this->query_bus->query($query);
    }
}
