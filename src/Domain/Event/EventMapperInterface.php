<?php

namespace Chaika\SharedKernel\Domain\Event;

interface EventMapperInterface
{
    public function map(DomainEventInterface $event): ?IntegrationEventInterface;

    /**
     * @param DomainEventInterface[] $events
     * @return IntegrationEventInterface[]
     */
    public function mapAll(array $events): array;
}