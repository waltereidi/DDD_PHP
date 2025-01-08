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
    private array $categories;
    public function __construct(
        CreateBook $createBook,
        CreateBookReader $createBookReader,
        array $createBookCategory,
        array $createCategories,
        )
    {
        $this->createBook = $createBook;
        $this->createBookReader = $createBookReader;
        $this->createCategories = $this->setCreateCategories($createCategories);
        $this->createBookCategory = $this->setCreateBookCategory($createBookCategory);
    }
    public function setCreateCategories(array $createCategories ) : array
    {
        return $this->ensureClassIsValid($createCategories , CreateCategory::class) 
            ? $createCategories 
            : throw new \Exception("");
    }    
    public function ensureClassIsValid(array $a , string $className ) : bool
    {
        return array_filter($this->categories , fn($x)=>$x::class != $className ) 
            ? true 
            : false;
    }

    public function setCreateBookCategory(array $createBookCategory ) : array
    {
        return $this->ensureClassIsValid($createBookCategory , CreateCategory::class) 
            ? $createBookCategory 
            : throw new \Exception("");
    }    
    public function createBook() : CreateBook
    {
        return $this->createBook;
    }
    public function createBookReader() : CreateBookReader
    {
        return $this->createBookReader;
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
