<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Application\QueryHandler\Interactions\Web;

use Enraged\Xenomorph\Application\Infrastructure\DBAL\Example\DomainObjectDbalInterface;
use Enraged\Xenomorph\Interactions\Web\Query\Model\DomainObjectModel;
use Enraged\Xenomorph\Interactions\Web\Query\ShowDomainObjectQuery;

class ShowDomainObjectHandler
{
    public function __construct(
        private DomainObjectDbalInterface $domain_objects
    ) {
    }

    public function __invoke(ShowDomainObjectQuery $query) : DomainObjectModel
    {
        return new DomainObjectModel(
            $this
                ->domain_objects
                ->getById($query->getId())
                ->getId()
        );
    }
}
