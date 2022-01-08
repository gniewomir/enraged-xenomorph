<?php

declare(strict_types=1);

namespace Tests\Enraged\Xenomorph\Context;

use Tests\Enraged\Xenomorph\Context\Infrastructure\BusContextTrait;
use Tests\Enraged\Xenomorph\Context\Infrastructure\CalendarContextTrait;
use Tests\Enraged\Xenomorph\Context\Infrastructure\DatabaseContextTrait;
use Tests\Enraged\Xenomorph\Context\Infrastructure\HttpContextTrait;

trait InfrastructureContextTrait
{
    use BusContextTrait;
    use DatabaseContextTrait;
    use CalendarContextTrait;
    use HttpContextTrait;

    protected function setUp() : void
    {
        parent::setUp();
        if (method_exists($this, $method = 'setUpDatabase')) {
            $this->{$method}();
        }
    }
}
