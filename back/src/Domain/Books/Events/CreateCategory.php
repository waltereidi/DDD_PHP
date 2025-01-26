<?php

namespace App\Domain\Books\Events;

use App\Domain\DomainEvent;
use Ramsey\Uuid\Lazy\LazyUuidFromString;
use Ramsey\Uuid\Nonstandard\Uuid;

class CreateCategory implements DomainEvent
{
    private LazyUuidFromString $id ;
    private string $name ; 
    private string|null $description ; 
    private bool $active ; 
    private \DateTimeImmutable $occurredOn;
    public function __construct(string $id ,string $name , string|null $description , bool|null $active)
    {
        $this->id = Uuid::fromString($id);
        $this->occurredOn = new \DateTimeImmutable();
        $this->name = $name ?? throw new \InvalidArgumentException('Name is required');
        $this->description = $description;  
        $this->active = $active ?? false;
    }
    public function getId(): LazyUuidFromString
    {
        return $this->id;
    }

    public function getName() : string
    {
        return $this->name;
    }
    public function getDescription(): ?string
    {
        return $this->description;
    }
    public function getActive() : bool
    {
        return $this->active;
    }

    public function occurredOn(): \DateTimeImmutable
    {
        return $this->occurredOn;
    }
    

}
