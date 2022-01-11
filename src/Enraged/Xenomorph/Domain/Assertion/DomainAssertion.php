<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Domain\Assertion;

use Enraged\Xenomorph\Domain\Exception\DomainInvalidAssertionException;
use Webmozart\Assert\Assert;

class DomainAssertion extends Assert
{
    /**
     * @param string $message
     *
     * @throws DomainInvalidAssertionException
     *
     * @psalm-pure this method is not supposed to perform side-effects
     */
    protected static function reportInvalidArgument($message) : void
    {
        throw new DomainInvalidAssertionException($message);
    }
}
