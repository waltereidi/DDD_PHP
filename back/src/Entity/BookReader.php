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
    private Book $book;
    private User $user;
    private LazyUuidFromString $book_id; 
    private LazyUuidFromString $user_id;
    private ?string $commentary = null;

    public function getBookId(): Book
    {
        return $this->book;
    }

    public function getCommentary(): ?string
    {
        return $this->commentary;
    }
    public function getUser(): User
    {
        return $this->user;
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
