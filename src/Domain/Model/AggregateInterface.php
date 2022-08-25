<?php

namespace Chaika\SharedKernel\Domain\Model;

use Chaika\SharedKernel\Domain\Event\DomainEventInterface;

interface AggregateInterface extends EntityInterface
{
    public function raise(DomainEventInterface $event): self;
    public function pullEvents(): array;
}