<?php

declare(strict_types=1);

namespace Tests\Enraged\Xenomorph\Context;

trait ProjectContextTrait
{
    use InteractionsContextTrait;
    use ApplicationContextTrait;
    use DomainContextTrait;
    use InfrastructureContextTrait;
}
