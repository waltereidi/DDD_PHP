<?php

namespace App\Entity;

use App\Domain\Books\Events\CreateBookCategory;
use App\Domain\DomainEvent;
use App\Domain\DomainEventSubscriber;
use App\Domain\Subscriber;
use App\Repository\BookCategoryRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Lazy\LazyUuidFromString;
use Ramsey\Uuid\Uuid;

#[ORM\Entity(repositoryClass: BookCategoryRepository::class)]
class BookCategory extends Entity implements Subscriber
{
    public LazyUuidFromString $book_id; 
    public LazyUuidFromString $category_id;
    public Book $book;
    public Category $category;
    
    public function handle(DomainEvent $e) :void
    {
        array_push($this->events , $e);
        $this->when($e);
        $this->ensureValidState();
    }
    public function ensureValidState():void 
    {

    }

    protected function when(DomainEvent $e) :void
    {
        
    }
    public function isSubscribedTo(DomainEvent $e) : bool
    {
        if($e::class == CreateBookCategory::class){
            return (object)$e->id == $this->id;
        }else
            return false;
    }

}
