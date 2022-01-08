<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Application\Fixtures\Faker;

use Symfony\Component\Uid\UuidV4;

class Faker
{
    public function id() : UuidV4
    {
        return UuidV4::v4();
    }
}
