<?php

declare(strict_types=1);

namespace Tests\Enraged\Xenomorph\Context\Infrastructure;

use Enraged\Xenomorph\Application\Infrastructure\BUS\ApplicationEventBusInterface;
use Enraged\Xenomorph\CommandBusInterface;
use Enraged\Xenomorph\Domain\DomainEventBusInterface;
use Enraged\Xenomorph\QueryBusInterface;
use InvalidArgumentException;

trait BusContextTrait
{
    public function commandBus() : CommandBusInterface
    {
        $bus = $this->getContainer()->get(CommandBusInterface::class);
        if ($bus instanceof CommandBusInterface) {
            return $bus;
        }
        throw new InvalidArgumentException();
    }

    public function queryBus() : QueryBusInterface
    {
        $bus = $this->getContainer()->get(QueryBusInterface::class);
        if ($bus instanceof QueryBusInterface) {
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
