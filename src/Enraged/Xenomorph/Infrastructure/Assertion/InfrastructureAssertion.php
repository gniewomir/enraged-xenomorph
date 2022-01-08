<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Infrastructure\Assertion;

use Enraged\Packages\Assertion\Assertion;
use Enraged\Xenomorph\Infrastructure\Exception\InfrastructureInvalidAssertionException;

class InfrastructureAssertion extends Assertion
{
    /**
     * Exception to throw when an assertion failed.
     *
     * @var string
     */
    protected static $exceptionClass = InfrastructureInvalidAssertionException::class;
}
