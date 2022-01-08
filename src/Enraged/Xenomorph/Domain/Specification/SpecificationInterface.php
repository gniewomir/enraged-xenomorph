<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Domain\Specification;

interface SpecificationInterface
{
    public function isSatisfiedBy(mixed $candidate) : bool;

    public function lastError() : string;

    public function lastCandidate() : mixed;
}
