<?php

namespace Chaika\SharedKernel\Domain\Model;

use Chaika\SharedKernel\Domain\Event\DomainEventInterface;

abstract class Aggregate implements AggregateInterface
{
    private array $domainEvents = [];

    public function raise(DomainEventInterface $event): self
    {
        $this->domainEvents[] = $event;
        return $this;
    }

    public function pullEvents(): array
    {
        $events = $this->domainEvents;
        $this->domainEvents = [];
        return $events;
    }
}