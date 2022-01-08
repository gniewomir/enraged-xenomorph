<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Application\QueryHandler\Example;

use Enraged\Xenomorph\Application\Infrastructure\DBAL\Example\DomainObjectDbalInterface;
use Enraged\Xenomorph\Application\Query\Example\GetDomainObjectQuery;
use Enraged\Xenomorph\Application\Query\Example\Model\DomainObjectModel;

class GetDomainObjectHandler
{
    protected DomainObjectDbalInterface $domain_objects;

    public function __construct(DomainObjectDbalInterface $domain_objects)
    {
        $this->domain_objects = $domain_objects;
    }

    public function __invoke(GetDomainObjectQuery $query) : DomainObjectModel
    {
        return $this
            ->domain_objects
            ->getById($query->getId());
    }
}
