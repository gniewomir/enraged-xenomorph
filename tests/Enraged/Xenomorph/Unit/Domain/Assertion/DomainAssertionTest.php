<?php

declare(strict_types=1);

namespace Tests\Enraged\Xenomorph\Unit\Domain\Assertion;

use Enraged\Xenomorph\Domain\Assertion\DomainAssertion;
use Enraged\Xenomorph\Domain\Exception\DomainInvalidAssertionException;
use Tests\Enraged\Xenomorph\Unit\UnitTestCase;

class DomainAssertionTest extends UnitTestCase
{
    public function test_throws_correct_exception()
    {
        $this->expectException(DomainInvalidAssertionException::class);
        DomainAssertion::notEmpty([]);
    }
}
