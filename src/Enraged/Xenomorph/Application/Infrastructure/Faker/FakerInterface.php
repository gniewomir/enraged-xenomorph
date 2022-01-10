<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Application\Infrastructure\Faker;

use Symfony\Component\Uid\UuidV4;

interface FakerInterface
{
    public function id() : UuidV4;
}
