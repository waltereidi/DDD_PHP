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
    private User $user;
    private Book $book;
    private bool $active = true;
    private LazyUuidFromString $book_id; 
    private LazyUuidFromString $user_id;
    public function getUser(): User
    {
        return $this->user;
    }
    public function getBookId(): Book
    {
        return $this->book;
    }
    public function isActive(): ?bool
    {
        return $this->active;
    }

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
