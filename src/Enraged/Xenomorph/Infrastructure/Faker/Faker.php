<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Infrastructure\Faker;

use Enraged\Xenomorph\Application\Infrastructure\Faker\FakerInterface;
use Symfony\Component\Uid\UuidV4;

class Faker implements FakerInterface
{
    public function id() : UuidV4
    {
        return UuidV4::v4();
    }
}
