<?php

namespace App\Domain;

use Ramsey\Uuid\Lazy\LazyUuidFromString;

interface DomainEvent
{
    public function occurredOn(): \DateTimeImmutable;
}