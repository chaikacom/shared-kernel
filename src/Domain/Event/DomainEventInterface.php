<?php

namespace Chaika\SharedKernel\Domain\Event;

use Ramsey\Uuid\UuidInterface;

interface DomainEventInterface extends EventInterface
{
    public function eventId(): UuidInterface;
    public function occurredOn(): \DateTimeInterface;
}