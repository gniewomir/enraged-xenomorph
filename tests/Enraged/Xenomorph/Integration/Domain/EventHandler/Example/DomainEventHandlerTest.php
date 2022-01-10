<?php

declare(strict_types=1);

namespace Tests\Enraged\Xenomorph\Integration\Domain\EventHandler\Example;

use Enraged\Xenomorph\Domain\Event\Example\DomainEvent;
use Symfony\Component\Messenger\Envelope;
use Tests\Enraged\Xenomorph\Integration\IntegrationTestCase;

class DomainEventHandlerTest extends IntegrationTestCase
{
    public function test_for_smoke_of_domain_event_bus()
    {
        $this->assertInstanceOf(
            Envelope::class,
            $this->domainEventBus()->event(new DomainEvent())
        );
    }
}
