<?php

namespace Chaika\SharedKernel\Domain\Event;

use Ramsey\Uuid\UuidInterface;

interface IntegrationEventInterface extends EventInterface
{
    public function id(): UuidInterface;
    public function occurredOn(): \DateTimeInterface;
}