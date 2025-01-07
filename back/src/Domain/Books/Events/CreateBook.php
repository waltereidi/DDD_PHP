<?php

namespace App\Domain\Books\Events;

use App\Domain\DomainEvent;

class CreateBook implements DomainEvent
{
    private string $title ; 
    private string|null $description ; 
    private string $isbn;
    private string $isbn13;
    private array $categories;
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
    public function setCategories(array $categories ) : array
    {
        if(array_filter($this->categories , fn($x)=>$x::class != CreateNewCategory::class))
            throw new \InvalidArgumentException('Categories must be an array of CreateNewCategory');
        else
            $this->categories = $categories;
        
        return $this->categories;
    }    
    public function getName() : string
    {
        return $this->title;
    }
    public function getDescription(): ?string
    {
        return $this->description;
    }
    public function getIsbn() : string
    {
        return $this->isbn;
    }
    public function getIsbn13() : string 
    {
        return $this->isbn13;
    }
    public function getCategories() : array
    {
        return $this->categories;
    }

    public function occurredOn(): \DateTimeImmutable
    {
        return $this->occurredOn;
    }
    

}
