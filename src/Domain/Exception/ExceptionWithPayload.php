<?php

namespace Chaika\SharedKernel\Domain\Exception;

/**
 * @deprecated
 */
abstract class ExceptionWithPayload extends Exception
{
    public abstract function payload(): array;
}