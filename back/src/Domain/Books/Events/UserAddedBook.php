<?php

namespace App\Domain\Books\Events;

use App\Domain\DomainEvent;

class UserAddedBook implements DomainEvent
{

    private \DateTimeImmutable $occurredOn;


    public function __construct(
         CreateBook $createBookReader
        ,array $categories 
        ,CreateBookReader $createBookReader 
        )
    {


        $this->categories = $this->setCategories($categories);

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
