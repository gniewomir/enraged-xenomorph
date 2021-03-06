<?php

declare(strict_types=1);

namespace Enraged\Xenomorph\Infrastructure\BUS\Middleware;

use Enraged\Xenomorph\CalendarInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Middleware\MiddlewareInterface;
use Symfony\Component\Messenger\Middleware\StackInterface;
use Symfony\Component\Messenger\Stamp\ReceivedStamp;
use Symfony\Component\Messenger\Stamp\SentStamp;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\SerializerInterface;

class AuditMiddleware implements MiddlewareInterface
{
    protected CalendarInterface $calendar;
    protected LoggerInterface $bus_audit_logger;
    protected SerializerInterface $serializer;
    protected Security $security;

    public function __construct(
        LoggerInterface $busAuditLogger,
        SerializerInterface $serializer,
        Security $security
    ) {
        $this->bus_audit_logger = $busAuditLogger;
        $this->serializer = $serializer;
        $this->security = $security;
    }

    public function handle(Envelope $envelope, StackInterface $stack) : Envelope
    {
        $context = [
            'class' => get_class($envelope->getMessage()),
            'user' => ($user = $this->security->getUser()) instanceof UserInterface ? $user->getUserIdentifier() : null,
            'payload' => $this->serializer->serialize($envelope->getMessage(), 'json'),
        ];

        $envelope = $stack->next()->handle($envelope, $stack);

        if ($envelope->last(ReceivedStamp::class)) {
            $this->bus_audit_logger->info('[{id}] Received {class}', $context);

            return $envelope;
        }

        if ($envelope->last(SentStamp::class)) {
            $this->bus_audit_logger->info('[{id}] Sent {class}', $context);

            return $envelope;
        }

        $this->bus_audit_logger->info('[{id}] Handled sync {class}', $context);

        return $envelope;
    }
}
