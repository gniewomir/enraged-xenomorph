<?php

declare(strict_types=1);

namespace Tests\Enraged\Xenomorph\Integration\Application\CommandHandler\Example;

use Enraged\Xenomorph\Application\Command\Example\CreateDomainObjectCommand;
use Enraged\Xenomorph\Application\CommandHandler\Example\CreateDomainObjectHandler;
use Enraged\Xenomorph\Domain\Example\DomainObjectInterface;
use Symfony\Component\Uid\Uuid;
use Tests\Enraged\Xenomorph\Integration\IntegrationTestCase;

class CreateDomainObjectHandlerTest extends IntegrationTestCase
{
    public function test_handler()
    {
        $this
            ->getContainer()
            ->get(CreateDomainObjectHandler::class)
            ->__invoke(
                new CreateDomainObjectCommand(
                    (string) ($id = Uuid::v4())
                )
            );
        $this->assertTrue(
            $this
                ->getContainer()
                ->get(DomainObjectInterface::class)
                ->exists($id)
        );
    }
}
