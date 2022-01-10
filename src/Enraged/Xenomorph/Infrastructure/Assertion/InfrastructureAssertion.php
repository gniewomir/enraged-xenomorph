<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Infrastructure\Assertion;

use Assert\InvalidArgumentException;
use Enraged\Packages\Assertion\Assertion;
use Enraged\Xenomorph\Infrastructure\Exception\InfrastructureInvalidAssertionException;

class InfrastructureAssertion extends Assertion
{
    /**
     * Helper method that handles building the assertion failure exceptions.
     * They are returned from this method so that the stack trace still shows
     * the assertions method.
     *
     * @param mixed                $value
     * @param string|callable|null $message
     * @param int                  $code
     * @param null                 $propertyPath
     * @param mixed[]              $constraints
     */
    protected static function createException($value, $message, $code, $propertyPath = null, array $constraints = []) : InfrastructureInvalidAssertionException
    {
        $exception = new InvalidArgumentException($message, $code, $propertyPath, $value, $constraints);

        return new InfrastructureInvalidAssertionException(
            $exception->getMessage(),
            0,
            $exception
        );
    }
}
