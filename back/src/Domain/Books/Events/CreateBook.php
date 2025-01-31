<?php

namespace App\Domain\Books\Events;

use App\Domain\DomainEvent;
use Ramsey\Uuid\Lazy\LazyUuidFromString;
use Ramsey\Uuid\Uuid;

class CreateBook implements DomainEvent
{
    public string $id ;
    public string $title ; 
    public string|null $description ; 
    public string $isbn;
    public string $isbn13;
    public \DateTimeImmutable $occurredOn;


    public function __construct(
        ?string $id,
        string $title 
        ,string|null $description 
        ,string $isbn 
        ,string|null $isnb13 )
    {
        $this->id = $id;
        $this->occurredOn = new \DateTimeImmutable();
        $this->title = $title ?? throw new \InvalidArgumentException('title is required');
        $this->description = $description; 
        $this->isbn = $isbn ?? throw new \InvalidArgumentException('isbn is required');
        $this->isbn13 = $isnb13;
    }
    public function getId(): LazyUuidFromString
    {
        return $this->id == null 
            ? Uuid::fromString($this->id)
            : Uuid::uuid4();
    }
    public function title(): string
    {
        return $this->title;
    }
    public function description(): string
    {
        return $this->description;
    }
    public function isbn(): string
    {
        return $this->isbn;
    }
    public function isnb13(): string
    {
        return $this->isbn13;
    }
    public function occurredOn(): \DateTimeImmutable
    {
        return $this->occurredOn;
    }
    

}
