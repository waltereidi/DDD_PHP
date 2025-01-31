<?php

namespace App\Domain\Books\Events;

use App\Domain\DomainEvent;

class UserAddedBook implements DomainEvent
{

    private \DateTimeImmutable $occurredOn;
    private CreateBook $createBook;
    private CreateBookReader $createBookReader;
    /**
     * Summary of categories
     * @var array<CreateCategory>
     */
    private ?array $createCategories;
        

    public function __construct(
        CreateBook $createBook,
        CreateBookReader $createBookReader,
        array $createCategories,
        )
    {
        $this->createBook = $createBook;
        $this->createBookReader = $createBookReader;
        $this->createCategories = $this->setCreateCategories($createCategories);
    }
    public function setCreateCategories(array $createCategories ) : array
    {
        return $this->ensureClassIsValid($createCategories , CreateCategory::class) 
            ? $createCategories 
            : throw new \Exception("");
    }    
    public function ensureClassIsValid(array $a , string $className ) : bool
    {
        return array_filter($this->createCategories , fn($x)=>$x::class != $className ) 
            ? true 
            : false;
    }
    
    public function getCreateBook() : CreateBook
    {
        return $this->createBook;
    }
    public function createBookReader() : CreateBookReader
    {
        return $this->createBookReader;
    }   
    public function getCreateCategories() : array
    {
        return $this->createCategories;
    }
    public function occurredOn(): \DateTimeImmutable
    {
        return $this->occurredOn;
    }
    

}
