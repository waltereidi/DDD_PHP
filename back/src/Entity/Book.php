<?php

namespace App\Entity;

use App\Domain\Books\Events\CreateBook;
use App\Domain\DomainEvent;
use App\Domain\DomainEventSubscriber;
use App\Domain\Subscriber;
use App\Repository\BookRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book extends Entity implements Subscriber
{
    public string $title;
    public ?string $description = null;
    public string $isbn;
    public ?string $isbn13 = null;
    public BookCategory $bookCategory;

    /**
     * Refers to categories assigned to this book
     * @var BookCategory
     */
    public ?Collection  $book_categories = null; 
    /**
     * Refers to users who read this book
     * @var BookReader
     */
    public ?Collection  $book_reader = null; 
    /**
     * Refers to users who are reading this book now
     * @var UserBookReadingNow
     */
    public ?Collection  $reading_now = null; 
  

    public function handle(DomainEvent $e) :void
    {
        array_push($this->events , $e);
        $this->when($e);
        $this->ensureValidState();
    }
    public function ensureValidState():void 
    {

    }

    public function when(DomainEvent $e) :void
    {
        
    }
    public function isSubscribedTo(DomainEvent $e) : bool
    {
        if($e::class == CreateBook::class){
            return (object)$e->id == $this->id;
        }else
            return false;
    }
}
