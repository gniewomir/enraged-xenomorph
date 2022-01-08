<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Infrastructure\BUS;

use Enraged\Xenomorph\Application\Infrastructure\BUS\ApplicationQueryBusInterface;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

class ApplicationQueryBus implements ApplicationQueryBusInterface
{
    use HandleTrait;

    public function __construct(MessageBusInterface $applicationQueryBus)
    {
        $this->messageBus = $applicationQueryBus;
    }

    public function query(object $query) : mixed
    {
        return $this->handle($query);
    }
}
