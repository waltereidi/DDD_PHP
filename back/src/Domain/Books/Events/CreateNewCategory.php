<?php

use App\Domain\DomainEvent;

class CreateNewCategory implements DomainEvent
{
    private $name ; 
    private $description ; 
    private $active ; 
    private DateTimeImmutable $occurredOn;
    public function __construct(string $name , string $description = null , bool $active = false)
    {
        $this->occurredOn = new DateTimeImmutable();
        $this->name = $name ?? throw new InvalidArgumentException('Name is required');
        $this->description = $description;  
        $this->active = $active;
    }

    public function occurredOn(): DateTimeImmutable
    {
        return $this->occurredOn;
    }
    

}
