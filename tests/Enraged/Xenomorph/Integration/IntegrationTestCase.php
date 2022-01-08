<?php

declare(strict_types=1);

namespace Tests\Enraged\Xenomorph\Integration;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Tests\Enraged\Xenomorph\Context\InfrastructureContextTrait;

class IntegrationTestCase extends KernelTestCase
{
    use InfrastructureContextTrait;
}
