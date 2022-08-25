<?php

namespace Chaika\SharedKernel\Domain\Event;

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

abstract class IntegrationEvent implements IntegrationEventInterface
{
    protected $id;
    protected $occurredOn;

    public function __construct()
    {
        $this->id = Uuid::uuid4();
        $this->occurredOn = Carbon::now();
    }

    public function id(): UuidInterface
    {
        return $this->id;
    }

    public function occurredOn(): \DateTimeInterface
    {
        return $this->occurredOn;
    }
}