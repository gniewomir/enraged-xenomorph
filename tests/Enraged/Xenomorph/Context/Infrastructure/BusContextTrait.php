<?php

declare(strict_types=1);

namespace Tests\Enraged\Xenomorph\Context\Infrastructure;

use Enraged\Xenomorph\Application\Infrastructure\BUS\ApplicationCommandBusInterface;
use Enraged\Xenomorph\Application\Infrastructure\BUS\ApplicationEventBusInterface;
use Enraged\Xenomorph\Application\Infrastructure\BUS\ApplicationQueryBusInterface;
use Enraged\Xenomorph\Domain\DomainEventBusInterface;
use InvalidArgumentException;

trait BusContextTrait
{
    public function applicationCommandBus() : ApplicationCommandBusInterface
    {
        $bus = $this->getContainer()->get(ApplicationCommandBusInterface::class);
        if ($bus instanceof ApplicationCommandBusInterface) {
            return $bus;
        }
        throw new InvalidArgumentException();
    }

    public function applicationQueryBus() : ApplicationQueryBusInterface
    {
        $bus = $this->getContainer()->get(ApplicationQueryBusInterface::class);
        if ($bus instanceof ApplicationQueryBusInterface) {
            return $bus;
        }
        throw new InvalidArgumentException();
    }

    public function applicationEventBus() : ApplicationEventBusInterface
    {
        $bus = $this->getContainer()->get(ApplicationEventBusInterface::class);
        if ($bus instanceof ApplicationEventBusInterface) {
            return $bus;
        }
        throw new InvalidArgumentException();
    }

    public function domainEventBus() : DomainEventBusInterface
    {
        $bus = $this->getContainer()->get(DomainEventBusInterface::class);
        if ($bus instanceof DomainEventBusInterface) {
            return $bus;
        }
        throw new InvalidArgumentException();
    }
}
