<?php

declare(strict_types=1);

namespace Tests\Enraged\Xenomorph\Unit\Domain\Example;

use DateTimeImmutable;
use Enraged\Xenomorph\Domain\Example\DomainObject;
use Enraged\Xenomorph\Domain\Example\IdDoNotExistSpecification;
use Enraged\Xenomorph\Domain\Exception\DomainInvalidAssertionException;
use Symfony\Component\Uid\UuidV4;
use Tests\Enraged\Xenomorph\Unit\UnitTestCase;

class DomainObjectTest extends UnitTestCase
{
    public function test_tests_id_candidate()
    {
        $this->expectExceptionObject(
            new DomainInvalidAssertionException($error = 'lastError')
        );
        new DomainObject(
            new UuidV4(),
            new DateTimeImmutable(),
            new class($error) extends IdDoNotExistSpecification {
                protected string $error;

                public function __construct(string $error)
                {
                    $this->error = $error;
                }

                public function isSatisfiedBy(mixed $candidate) : bool
                {
                    return false;
                }

                public function lastError() : string
                {
                    return $this->error;
                }
            }
        );
    }
}
