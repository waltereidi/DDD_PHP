<?php

namespace App\Domain;

interface DomainEvent
{
    public function occurredOn(): \DateTimeImmutable;
}