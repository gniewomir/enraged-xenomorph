<?php

declare(strict_types=1);

namespace Tests\Enraged\Xenomorph\Unit\Interactions\Assertion;

use Enraged\Xenomorph\Interactions\Assertion\InteractionsAssertion;
use Enraged\Xenomorph\Interactions\Exception\InteractionsInvalidAssertionException;
use Tests\Enraged\Xenomorph\Unit\UnitTestCase;

class InteractionsAssertionTest extends UnitTestCase
{
    public function test_throws_correct_exception()
    {
        $this->expectException(InteractionsInvalidAssertionException::class);
        InteractionsAssertion::notEmpty([]);
    }
}
