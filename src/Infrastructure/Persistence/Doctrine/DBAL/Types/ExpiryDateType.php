<?php

declare(strict_types=1);

namespace Chaika\SharedKernel\Infrastructure\Persistence\Doctrine\DBAL\Types;

use Chaika\SharedKernel\Domain\ValueObject\ExpiryDate;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\DateTimeType;

class ExpiryDateType extends DateTimeType
{
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if (null === $value) {
            return null;
        } else if ($value instanceof ExpiryDate) {
            return parent::convertToDatabaseValue($value->when(), $platform);
        }

        return parent::convertToDatabaseValue($value, $platform);
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        $value = parent::convertToPHPValue($value, $platform);

        if (null === $value) {
            return null;
        }

        return ExpiryDate::create($value);
    }

    public function getName()
    {
        return 'expiry_date';
    }
}
