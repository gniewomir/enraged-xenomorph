<?php

declare(strict_types=1);

namespace Tests\Enraged\Xenomorph\Unit\Infrastructure\Assertion;

use Enraged\Xenomorph\Infrastructure\Assertion\InfrastructureAssertion;
use Enraged\Xenomorph\Infrastructure\Exception\InfrastructureInvalidAssertionException;
use Tests\Enraged\Xenomorph\Unit\UnitTestCase;

class InfrastructureAssertionTest extends UnitTestCase
{
    public function test_throws_correct_exception()
    {
        $this->expectException(InfrastructureInvalidAssertionException::class);
        InfrastructureAssertion::notEmpty([]);
    }
}
