<?php

namespace Chaika\SharedKernel\Domain\Event;

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

abstract class IntegrationEvent implements IntegrationEventInterface
{
    protected $eventId;
    protected $occurredOn;

    public function __construct()
    {
        $this->eventId = Uuid::uuid4();
        $this->occurredOn = Carbon::now();
    }

    public function eventId(): UuidInterface
    {
        return $this->eventId;
    }

    public function setEventId(UuidInterface $eventId): self
    {
        $this->eventId = $eventId;
        return $this;
    }

    public function occurredOn(): \DateTimeInterface
    {
        return $this->occurredOn;
    }
}