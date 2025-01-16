<?php

namespace App\Domain\Books\Events;

use App\Domain\DomainEvent;

class CreateBook implements DomainEvent
{
    private string $title ; 
    private string|null $description ; 
    private string $isbn;
    private string $isbn13;
    private \DateTimeImmutable $occurredOn;


    public function __construct(
        string $title 
        ,string|null $description 
        ,string $isbn 
        ,string|null $isnb13 )
    {
        $this->occurredOn = new \DateTimeImmutable();
        $this->title = $title ?? throw new \InvalidArgumentException('title is required');
        $this->description = $description; 
        $this->isbn = $isbn ?? throw new \InvalidArgumentException('isbn is required');
        $this->isbn13 = $isnb13;
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
