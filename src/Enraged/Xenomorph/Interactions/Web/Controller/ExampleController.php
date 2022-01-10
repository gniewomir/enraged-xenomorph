<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Interactions\Web\Controller;

use Enraged\Xenomorph\Application\Command\Example\CreateDomainObjectCommand;
use Enraged\Xenomorph\CommandBusInterface;
use Enraged\Xenomorph\Interactions\Web\Query\ShowDomainObjectQuery;
use Enraged\Xenomorph\Interactions\Web\QueryResult\ShowDomainObjectQueryResult;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\UuidV4;

class ExampleController
{
    #[Route('/example', name: 'example_index')]
    public function indexHtml(
        CommandBusInterface $application_command_bus,
        ShowDomainObjectQueryResult $show_domain_object_query_result,
    ) : Response {
        $application_command_bus->command(new CreateDomainObjectCommand($id = (string) UuidV4::v4()));

        return new Response(var_export($show_domain_object_query_result(new ShowDomainObjectQuery($id)), true));
    }
}
