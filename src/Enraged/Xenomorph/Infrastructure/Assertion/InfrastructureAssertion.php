<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Infrastructure\Assertion;

use Enraged\Xenomorph\Infrastructure\Exception\InfrastructureInvalidAssertionException;
use Webmozart\Assert\Assert;

class InfrastructureAssertion extends Assert
{
    /**
     * @param string $message
     *
     * @throws InfrastructureInvalidAssertionException
     *
     * @psalm-pure this method is not supposed to perform side-effects
     */
    protected static function reportInvalidArgument($message) : void
    {
        throw new InfrastructureInvalidAssertionException($message);
    }
}
