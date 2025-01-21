<?php

namespace App\Entity;

use App\Domain\DomainEvent;
use App\Domain\DomainEventSubscriber;
use App\Repository\BookRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book extends Entity implements DomainEventSubscriber
{
    private string $title;
    private ?string $description = null;
    private string $isbn;
    private ?string $isbn13 = null;
    /**
     * Refers to categories assigned to this book
     * @var BookCategory
     */
    private ?Collection  $categories = null; 
    /**
     * Refers to users who read this book
     * @var BookReader
     */
    private ?Collection  $book_reader = null; 
    /**
     * Refers to users who are reading this book now
     * @var UserBookReadingNow
     */
    private ?Collection  $reading_now = null; 
    public function getCategories(): array
    {
        return $this->categories->getValues();
    }
    public function getBookReader():array
    {
        return $this->book_reader->getValues();
    }
    public function getReadingNow() :array
    {
        return $this->reading_now->getValues();
    }
    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

        public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function getIsbn13(): ?string
    {
        return $this->isbn13;
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
