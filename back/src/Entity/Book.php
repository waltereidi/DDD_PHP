<?php

namespace App\Entity;

use App\Domain\DomainEvent;
use App\Domain\DomainEventSubscriber;
use App\Domain\Subscriber;
use App\Repository\BookRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book extends Entity implements Subscriber
{
    private string $title;
    private ?string $description = null;
    private string $isbn;
    private ?string $isbn13 = null;
    private BookCategory $bookCategory;

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
        $categories = $this->categories->getValues();
        return $categories;
    }
    public function getBookReader(): array
    {
        $bookReader = $this->book_reader->getValues();
        return $bookReader;
    }
    public function getReadingNow() :array
    {
        $readingNow = $this->reading_now->getValues();
        return $readingNow;
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
