<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Infrastructure\ORM\Example;

use Enraged\Xenomorph\Domain\Example\DomainObject;
use Enraged\Xenomorph\Domain\Example\DomainObjectInterface;
use Enraged\Xenomorph\Infrastructure\Exception\InfrastructureOrmNotFoundException;
use Symfony\Component\Uid\UuidV4;

class DomainObjectInMemoryRepository implements DomainObjectInterface
{
    /**
     * @var DomainObject[]
     */
    private array $domain_objects;

    public function persist(DomainObject $domain_object) : void
    {
        $this->domain_objects[(string) $domain_object->id()] = $domain_object;
    }

    public function exists(UuidV4 $id) : bool
    {
        foreach ($this->domain_objects as $stored_id => $domain_object) {
            if ($stored_id === (string) $id) {
                return true;
            }
        }

        return false;
    }

    public function getById(UuidV4 $id) : DomainObject
    {
        foreach ($this->domain_objects as $stored_id => $domain_object) {
            if ($stored_id === (string) $domain_object->id()) {
                return $domain_object;
            }
        }
        throw new InfrastructureOrmNotFoundException();
    }
}
