<?php

namespace App\Entity;

use App\Domain\Books\Events\CreateUserBookReadingNow;
use App\Domain\DomainEvent;
use App\Domain\DomainEventSubscriber;
use App\Domain\Subscriber;
use App\Repository\UserBookReadingNowRepository;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Lazy\LazyUuidFromString;

#[ORM\Entity(repositoryClass: UserBookReadingNowRepository::class)]
class UserBookReadingNow extends Entity implements Subscriber
{
    public User $user;
    public Book $book;
    public bool $active = true;
    public LazyUuidFromString $book_id; 
    public LazyUuidFromString $user_id;
  
    public function handle(DomainEvent $aDomainEvent) :void
    {
    }

    public function when(DomainEvent $e) :void
    {
    }
        
    public function isSubscribedTo(DomainEvent $e) : bool
    {
        if($e::class == CreateUserBookReadingNow::class){
            return (object)$e->id == $this->id;
        }else
            return false;
    }
}
