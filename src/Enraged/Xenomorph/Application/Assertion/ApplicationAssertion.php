<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Application\Assertion;

use Enraged\Packages\Assertion\Assertion;
use Enraged\Xenomorph\Application\Exception\ApplicationInvalidAssertionException;

class ApplicationAssertion extends Assertion
{
    /**
     * Exception to throw when an assertion failed.
     *
     * @var string
     */
    protected static $exceptionClass = ApplicationInvalidAssertionException::class;
}
