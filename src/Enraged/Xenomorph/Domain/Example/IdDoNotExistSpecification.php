<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Domain\Example;

use Enraged\Xenomorph\Domain\Assertion\DomainAssertion;
use Enraged\Xenomorph\Domain\Specification\AbstractSpecification;
use Enraged\Xenomorph\Domain\Specification\SpecificationInterface;
use Symfony\Component\Uid\UuidV4;

/**
 * Autowired as service.
 */
class IdDoNotExistSpecification extends AbstractSpecification implements SpecificationInterface
{
    protected DomainObjectInterface $domain_objects;

    public function __construct(DomainObjectInterface $domain_objects)
    {
        $this->domain_objects = $domain_objects;
    }

    public function assertions(UuidV4 $candidate) : void
    {
        DomainAssertion::false($this->domain_objects->exists($candidate));
    }
}
