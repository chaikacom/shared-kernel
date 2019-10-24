<?php

declare(strict_types=1);

namespace Chaika\SharedKernel\Infrastructure\Persistence\Doctrine\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\GuidType;

abstract class AbstractUuidType extends GuidType
{
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        $class = $this->getClass();
        if (null === $value) {
            return null;
        } else if ($value instanceof $class) {
            return $value->id();
        }

        return (string) $value;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if (null === $value) {
            return null;
        }

        $className = $this->getClass();
        return new $className($value);
    }

    abstract public function getClass(): string;
}
