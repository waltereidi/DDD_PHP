<?php

namespace App\Entity;

use App\Domain\DomainEvent;
use App\Domain\DomainEventSubscriber;
use App\Domain\Subscriber;
use App\Repository\BookCategoryRepository;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Lazy\LazyUuidFromString;
use Ramsey\Uuid\Uuid;

#[ORM\Entity(repositoryClass: BookCategoryRepository::class)]
class BookCategory extends Entity implements Subscriber
{
    private LazyUuidFromString $book_id; 
    private LazyUuidFromString $category_id;
    private Book $book;
    private Category  $category;
    
    public function getBook(): ?Book
    {
        return $this->book;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function handle(DomainEvent $aDomainEvent) :void
    {
    }

    protected function when(DomainEvent $e) :void
    {
    }
    public function isSubscribedTo(DomainEvent $aDomainEvent) : bool
    {
        return true;
    }

}
