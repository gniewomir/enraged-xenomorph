<?php

declare(strict_types=1);

namespace Tests\Enraged\Xenomorph\Integration\Application\QueryResult\Example;

use Enraged\Xenomorph\Application\Command\Example\CreateDomainObjectCommand;
use Enraged\Xenomorph\Application\Query\Example\GetDomainObjectQuery;
use Enraged\Xenomorph\Application\QueryResult\Example\GetDomainObjectQueryResult;
use Symfony\Component\Uid\Uuid;
use Tests\Enraged\Xenomorph\Integration\IntegrationTestCase;

class GetDomainObjectQueryResultTest extends IntegrationTestCase
{
    public function test_result()
    {
        $this
            ->applicationCommandBus()
            ->command(
                new CreateDomainObjectCommand(
                    (string) ($id = Uuid::v4())
                )
            );
        $result = $this
            ->getContainer()
            ->get(GetDomainObjectQueryResult::class)
            ->__invoke(new GetDomainObjectQuery((string) $id));
        $this->assertEquals(
            (string) $id,
            $result->getId()
        );
    }
}
