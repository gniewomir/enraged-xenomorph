<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Infrastructure\DBAL\Example;

use Doctrine\DBAL\Connection;
use Enraged\Xenomorph\Application\Infrastructure\DBAL\Example\DomainObjectDbalInterface;
use Enraged\Xenomorph\Application\Query\Example\Model\DomainObjectModel;
use Enraged\Xenomorph\Infrastructure\Exception\InfrastructureDbalNotFoundException;

class DomainObjectDbal implements DomainObjectDbalInterface
{
    public function __construct(private Connection $connection)
    {
    }

    public function getById(string $id) : DomainObjectModel
    {
        $query = $this
            ->connection
            ->createQueryBuilder()
            ->from('ex_domain_example_domain_object', 'dedo')
            ->select('*')
            ->where('dedo.id = :id')
            ->setParameter('id', $id);

        $result = $this
            ->connection
            ->fetchAssociative(
                $query->getSQL(),
                $query->getParameters(),
                $query->getParameterTypes()
            );

        if (!$result) {
            throw new InfrastructureDbalNotFoundException('Example Domain Object database entry not found.');
        }

        return new DomainObjectModel($result['id']);
    }
}
