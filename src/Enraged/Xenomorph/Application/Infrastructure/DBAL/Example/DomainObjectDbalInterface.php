<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Application\Infrastructure\DBAL\Example;

use Enraged\Xenomorph\Application\Query\Example\Model\DomainObjectModel;

interface DomainObjectDbalInterface
{
    public function getById(string $id) : DomainObjectModel;
}
