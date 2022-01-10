<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Interactions\Web\Query;

class ShowDomainObjectQuery
{
    public function __construct(
        private string $id
    ) {
    }

    public function getId() : string
    {
        return $this->id;
    }
}
