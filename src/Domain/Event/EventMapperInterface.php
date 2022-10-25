<?php

namespace Chaika\SharedKernel\Domain\Event;

interface EventMapperInterface
{
    /**
     * @param DomainEventInterface $event
     * @return IntegrationEventInterface[]
     */
    public function map(DomainEventInterface $event): array;

    /**
     * @param DomainEventInterface[] $events
     * @return IntegrationEventInterface[]
     */
    public function mapAll(array $events): array;
}