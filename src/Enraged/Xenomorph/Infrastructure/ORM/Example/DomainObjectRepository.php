<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Infrastructure\ORM\Example;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Enraged\Xenomorph\Domain\Example\DomainObject;
use Enraged\Xenomorph\Domain\Example\DomainObjectInterface;
use Enraged\Xenomorph\Infrastructure\Exception\InfrastructureOrmNotFoundException;
use Symfony\Component\Uid\UuidV4;

class DomainObjectRepository implements DomainObjectInterface
{
    private EntityManagerInterface $entity_manager;
    private EntityRepository $repository;

    public function __construct(EntityManagerInterface $entity_manager)
    {
        $this->repository = $entity_manager->getRepository(DomainObject::class);
        $this->entity_manager = $entity_manager;
    }

    public function persist(DomainObject $domain_object) : void
    {
        $this->entity_manager->persist($domain_object);
    }

    public function exists(UuidV4 $id) : bool
    {
        return !is_null($this->repository->find($id));
    }

    public function getById(UuidV4 $id) : DomainObject
    {
        if ($domain_object = $this->repository->find($id)) {
            return $domain_object;
        }
        throw new InfrastructureOrmNotFoundException();
    }
}
