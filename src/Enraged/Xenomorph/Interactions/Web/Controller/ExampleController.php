<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Interactions\Web\Controller;

use Enraged\Xenomorph\Application\Command\Example\CreateDomainObjectCommand;
use Enraged\Xenomorph\Application\Infrastructure\BUS\ApplicationCommandBusInterface;
use Enraged\Xenomorph\Application\Infrastructure\BUS\ApplicationEventBusInterface;
use Enraged\Xenomorph\Application\Infrastructure\Calendar\ApplicationCalendarInterface;
use Enraged\Xenomorph\Application\Infrastructure\Storage\StorageFilesystemInterface;
use Enraged\Xenomorph\Application\Infrastructure\Storage\TemporaryFilesystemInterface;
use Enraged\Xenomorph\Application\Query\Example\GetDomainObjectQuery;
use Enraged\Xenomorph\Application\QueryResult\Example\GetDomainObjectQueryResult;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\UuidV4;

class ExampleController
{
    #[Route('/example', name: 'example_index')]
    public function indexHtml(
        StorageFilesystemInterface $storage,
        TemporaryFilesystemInterface $temporary,
        ApplicationCommandBusInterface $application_command_bus,
        ApplicationEventBusInterface $application_event_bus,
        GetDomainObjectQueryResult $get_domain_object_query_result,
        ApplicationCalendarInterface $application_calendar,
    ) : Response {
        $application_command_bus->command(new CreateDomainObjectCommand($id = (string) UuidV4::v4()));

        return new Response(
            var_export(
                $get_domain_object_query_result(
                    new GetDomainObjectQuery($id)
                ),
                true
            )
        );
    }
}
