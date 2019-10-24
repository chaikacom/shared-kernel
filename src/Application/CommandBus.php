<?php

declare(strict_types=1);

namespace Chaika\SharedKernel\Application;

interface CommandBus
{
    public function handle(CommandMessage $command): void;
}