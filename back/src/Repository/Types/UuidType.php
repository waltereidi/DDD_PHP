<?php

namespace App\Repository\Types;

use Doctrine\DBAL\Types\StringType;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Ramsey\Uuid\Uuid;


class UuidType extends StringType
{
    public function requiresSQLCommentHint(AbstractPlatform $platform): bool
    {
        return true;
    }

    /**
     * @param mixed $value
     * @return UuidType
     */
    public function convertToPHPValue($value, AbstractPlatform $platform) : Uuid
    {
        return Uuid::fromString($value);
    }

    /**
     * @param mixed $value
     * @return string
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        /** @var Uuid $value */
        return $value->toString();
    }

    public function getName()
    {
        return 'id';
    }
}