<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Domain\Assertion;

use Enraged\Packages\Assertion\Assertion;
use Enraged\Xenomorph\Domain\Exception\DomainInvalidAssertionException;

class DomainAssertion extends Assertion
{
    /**
     * Exception to throw when an assertion failed.
     *
     * @var string
     */
    protected static $exceptionClass = DomainInvalidAssertionException::class;
}
