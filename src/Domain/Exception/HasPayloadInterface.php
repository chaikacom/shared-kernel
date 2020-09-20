<?php

declare(strict_types=1);

namespace Chaika\SharedKernel\Domain\Exception;

interface HasPayloadInterface
{
    public function payload(): array;
}
