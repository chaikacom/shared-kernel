<?php

declare(strict_types=1);

namespace Chaika\SharedKernel\Application\MessageBus;

interface EventBus
{
    public function dispatch(EventMessage $event, ?Options $options = null): void;
}