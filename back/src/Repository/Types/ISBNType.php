<?php

namespace App\Repository\Types;

use App\Domain\ValueObjects\ISBN;
use Doctrine\DBAL\Types\StringType;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Ramsey\Uuid\Lazy\LazyUuidFromString;
use Ramsey\Uuid\Rfc4122\UuidInterface;
use Ramsey\Uuid\Uuid;

class ISBNType extends StringType
{
    public function requiresSQLCommentHint(AbstractPlatform $platform): bool
    {
        return true;
    }

    /**
     * @param mixed $value
     * @return UuidType
     */
    public function convertToPHPValue($value, AbstractPlatform $platform) : ISBN
    {
        return new ISBN($value);
    }
    /**
     * @param mixed $value
     * @return string
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        /** @var ISBN $value */
        return $value->getValue();
    }

    public function getName()
    {
        return 'isbn';
    }
}