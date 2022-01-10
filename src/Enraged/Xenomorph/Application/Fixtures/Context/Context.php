<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Application\Fixtures\Context;

use Enraged\Xenomorph\Application\Fixtures\Context\Example\DomainObjectContext;

class Context
{
    public function __construct(private DomainObjectContext $domain_object_context)
    {
    }

    public function createDomainObject() : DomainObjectContext
    {
        return $this->domain_object_context->setup();
    }
}
