<?php

declare(strict_types=1);

namespace Tests\Enraged\Xenomorph\Unit\Application\Assertion;

use Enraged\Xenomorph\Application\Assertion\ApplicationAssertion;
use Enraged\Xenomorph\Application\Exception\ApplicationInvalidAssertionException;
use Tests\Enraged\Xenomorph\Unit\UnitTestCase;

class ApplicationAssertionTest extends UnitTestCase
{
    public function test_throws_correct_exception()
    {
        $this->expectException(ApplicationInvalidAssertionException::class);
        ApplicationAssertion::notEmpty([]);
    }
}
