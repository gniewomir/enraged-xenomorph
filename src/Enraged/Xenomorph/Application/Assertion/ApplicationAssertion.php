<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Application\Assertion;

use Enraged\Xenomorph\Application\Exception\ApplicationInvalidAssertionException;
use Webmozart\Assert\Assert;

class ApplicationAssertion extends Assert
{
    /**
     * @param string $message
     *
     * @throws ApplicationInvalidAssertionException
     *
     * @psalm-pure this method is not supposed to perform side-effects
     */
    protected static function reportInvalidArgument($message) : void
    {
        throw new ApplicationInvalidAssertionException($message);
    }
}
