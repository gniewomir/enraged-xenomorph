<?php

declare(strict_types=1);

namespace Tests\Enraged\Xenomorph\Unit\Domain\Specification;

use Enraged\Xenomorph\Domain\Assertion\DomainAssertion;
use Enraged\Xenomorph\Domain\Exception\DomainNotImplementedException;
use Enraged\Xenomorph\Domain\Specification\AbstractSpecification;
use Exception;
use Tests\Enraged\Xenomorph\Unit\UnitTestCase;

class AbstractSpecificationTest extends UnitTestCase
{
    public function test_require_assertions_method_to_be_implemented()
    {
        $this->expectException(DomainNotImplementedException::class);
        $subject = new class() extends AbstractSpecification {
        };
        $subject->isSatisfiedBy(true);
    }

    public function test_returns_bool_on_invalid_domain_assertion()
    {
        $subject = new class() extends AbstractSpecification {
            public function assertions(bool $candidate) : void
            {
                DomainAssertion::true($candidate);
            }
        };
        $this->assertFalse($subject->isSatisfiedBy(false));
    }

    public function test_throws_on_non_domain_assertion_exception()
    {
        $this->expectExceptionObject(new Exception());
        $subject = new class() extends AbstractSpecification {
            public function assertions(bool $candidate) : void
            {
                throw new Exception();
            }
        };
        $subject->isSatisfiedBy(false);
    }

    public function test_allow_checking_last_candidate_and_last_error()
    {
        $subject = new class() extends AbstractSpecification {
            public function assertions(string $candidate) : void
            {
                DomainAssertion::eq('test', $candidate, 'not test');
            }
        };
        $this->assertFalse($subject->isSatisfiedBy('not test'));
        $this->assertEquals($subject->lastCandidate(), 'not test');
        $this->assertEquals($subject->lastError(), 'not test');
    }

    public function test_reset_last_candidate_and_last_error_between_tests()
    {
        $subject = new class() extends AbstractSpecification {
            public function assertions(string $candidate) : void
            {
                DomainAssertion::eq('test', $candidate, 'not test');
            }
        };
        $this->assertEquals($subject->lastCandidate(), null);
        $this->assertEquals($subject->lastError(), null);

        $this->assertFalse($subject->isSatisfiedBy('not test'));
        $this->assertEquals($subject->lastCandidate(), 'not test');
        $this->assertEquals($subject->lastError(), 'not test');

        $this->assertTrue($subject->isSatisfiedBy('test'));
        $this->assertEquals($subject->lastCandidate(), 'test');
        $this->assertEquals($subject->lastError(), null);

        $this->assertFalse($subject->isSatisfiedBy('other not test'));
        $this->assertEquals($subject->lastCandidate(), 'other not test');
        $this->assertEquals($subject->lastError(), 'not test');
    }
}
