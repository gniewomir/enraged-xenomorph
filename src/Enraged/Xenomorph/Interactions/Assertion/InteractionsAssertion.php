<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Interactions\Assertion;

use Enraged\Xenomorph\Interactions\Exception\InteractionsInvalidAssertionException;
use Webmozart\Assert\Assert;

class InteractionsAssertion extends Assert
{
    /**
     * @param string $message
     *
     * @throws InteractionsInvalidAssertionException
     *
     * @psalm-pure this method is not supposed to perform side-effects
     */
    protected static function reportInvalidArgument($message) : void
    {
        throw new InteractionsInvalidAssertionException($message);
    }
}
