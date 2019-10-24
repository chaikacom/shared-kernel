<?php

declare(strict_types=1);

namespace Chaika\SharedKernel\Domain\Model\Identity;

abstract class Id implements BaseId
{
    protected $id;

    /**
     * @param null|string $id
     */
    public function __construct(int $id = null)
    {
        $this->id = $id;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function equals(Id $id): bool
    {
        return $this->id === $id->id();
    }

    public function __toString(): string
    {
        return (string) $this->id;
    }
}