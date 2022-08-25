<?php

namespace Chaika\SharedKernel\Domain\Event;

interface EventPublisherInterface
{
    public function publish(EventInterface $event): void;
}