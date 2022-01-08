<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Domain\Example;

use DateTimeInterface;
use Enraged\Xenomorph\Domain\Assertion\DomainAssertion;
use Symfony\Component\Uid\UuidV4;

/**
 * Not autowired as service.
 */
class DomainObject
{
    private ?DateTimeInterface $updated_at = null;
    private ?DateTimeInterface $deleted_at = null;

    public function __construct(
        private UuidV4 $id,
        private DateTimeInterface $created_at,
        IdDoNotExistSpecification $do_not_exist_specification
    ) {
        DomainAssertion::true($do_not_exist_specification->isSatisfiedBy($id), $do_not_exist_specification->lastError());
    }

    public function id() : UuidV4
    {
        return $this->id;
    }

    public function createdAt() : DateTimeInterface
    {
        return $this->created_at;
    }

    public function updatedAt() : ?DateTimeInterface
    {
        return $this->updated_at;
    }

    public function deletedAt() : ?DateTimeInterface
    {
        return $this->deleted_at;
    }
}
