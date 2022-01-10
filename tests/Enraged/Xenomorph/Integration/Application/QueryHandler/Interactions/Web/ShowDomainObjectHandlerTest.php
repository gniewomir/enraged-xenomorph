<?php

declare(strict_types=1);

namespace Tests\Enraged\Xenomorph\Integration\Application\QueryHandler\Interactions\Web;

use Enraged\Xenomorph\Application\Command\Example\CreateDomainObjectCommand;
use Enraged\Xenomorph\Application\QueryHandler\Interactions\Web\ShowDomainObjectHandler;
use Enraged\Xenomorph\Interactions\Web\Query\Model\DomainObjectModel;
use Enraged\Xenomorph\Interactions\Web\Query\ShowDomainObjectQuery;
use Symfony\Component\Uid\UuidV4;
use Tests\Enraged\Xenomorph\Integration\IntegrationTestCase;

class ShowDomainObjectHandlerTest extends IntegrationTestCase
{
    public function test_handler()
    {
        $this->commandBus()->command(
            new CreateDomainObjectCommand(
                (string) ($id = UuidV4::v4())
            )
        );
        $this->assertInstanceOf(
            DomainObjectModel::class,
            $this
                ->getContainer()
                ->get(ShowDomainObjectHandler::class)
                ->__invoke(
                    new ShowDomainObjectQuery(
                        (string) $id
                    )
                )
        );
    }
}
