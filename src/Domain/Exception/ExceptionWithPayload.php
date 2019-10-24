<?php

namespace Chaika\SharedKernel\Domain\Exception;

abstract class ExceptionWithPayload extends Exception
{
    public abstract function payload(): array;
}