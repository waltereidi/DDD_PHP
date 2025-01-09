<?php

namespace App\Repository\Types;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Architecture\CQRS\Domain\PostId;
use Ramsey\Uuid\Guid\Guid;
use Ramsey\Uuid\Uuid;


class UuidType extends Type
{
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return $platform->getGuidTypeDeclarationSQL($fieldDeclaration);
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