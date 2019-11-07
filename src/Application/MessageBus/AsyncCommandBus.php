<?php

declare(strict_types=1);

namespace Chaika\SharedKernel\Application\MessageBus;

interface AsyncCommandBus
{
    public function handle(AsyncCommandMessage $command, string $queue, ?int $delay = null): void;
}