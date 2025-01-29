<?php

namespace App\Entity;

use App\Domain\DomainEvent;
use App\Domain\DomainEventSubscriber;
use App\Domain\Subscriber;
use App\Repository\BookReaderRepository;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Lazy\LazyUuidFromString;
use Ramsey\Uuid\Uuid;

#[ORM\Entity(repositoryClass: BookReaderRepository::class)]
class BookReader extends Entity implements Subscriber
{
    public Book $book;
    public User $user;
    public LazyUuidFromString $book_id; 
    public LazyUuidFromString $user_id;
    public ?string $commentary = null;


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
        if($e::class == BookCategory::class){
            return (object)$e->id == $this->id;
        }else
            return false;
    }

}
