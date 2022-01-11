<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Domain\Specification;

use Enraged\Xenomorph\Domain\Exception\DomainInvalidAssertionException;
use Enraged\Xenomorph\Domain\Exception\DomainNotImplementedException;

abstract class AbstractSpecification implements SpecificationInterface
{
    private ?string $error = null;
    private mixed $candidate = null;

    public function isSatisfiedBy(mixed $candidate) : bool
    {
        $this->error = null;
        $this->candidate = $candidate;
        if (!method_exists($this, 'assertions')) {
            throw new DomainNotImplementedException('Specification have to implement Specification::assertions(Hint $candidate) method!');
        }
        try {
            $this->assertions($candidate);
        } catch (DomainInvalidAssertionException $exception) {
            $this->error = $exception->getMessage();

            return false;
        }

        return true;
    }

    public function lastError() : string
    {
        return $this->error ?? '';
    }

    public function lastCandidate() : mixed
    {
        return $this->candidate;
    }
}
