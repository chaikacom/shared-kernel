<?php

declare(strict_types=1);

namespace Chaika\SharedKernel\Application\MessageBus;

interface Lockable
{
    public function lockTtl(): int;
}