<?php

declare(strict_types=1);

namespace Chaika\SharedKernel\Domain\Model\Identity;

use Ramsey\Uuid\Uuid as RUuid;

abstract class Uuid implements BaseId
{
    protected $id;

    /**
     * @param null|string $uuid
     * @throws InvalidIdException
     */
    public function __construct(?string $uuid = null)
    {
        if ($uuid) {
            if (RUuid::isValid($uuid)) {
                $this->id = $uuid;
            } else {
                throw new InvalidIdException(sprintf("Invalid uuid: %s", $uuid));
            }
        } else {
            $this->id = RUuid::uuid4()->toString();
        }
    }

    public function id(): string
    {
        return $this->id;
    }

    public function equals(Uuid $id): bool
    {
        return $this->id === $id->id();
    }

    public function __toString(): string
    {
        return (string) $this->id;
    }
}