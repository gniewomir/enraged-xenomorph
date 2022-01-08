<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Domain\Example;

use Symfony\Component\Uid\UuidV4;

interface DomainObjectInterface
{
    public function persist(DomainObject $domain_object) : void;

    public function exists(UuidV4 $id) : bool;

    public function getById(UuidV4 $id) : DomainObject;
}
