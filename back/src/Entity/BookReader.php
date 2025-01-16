<?php

namespace App\Entity;

use App\Domain\DomainEvent;
use App\Domain\DomainEventSubscriber;
use App\Repository\BookReaderRepository;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

#[ORM\Entity(repositoryClass: BookReaderRepository::class)]
class BookReader extends Entity implements DomainEventSubscriber
{
    private Uuid $book_id;
    private Uuid $user_id;
    private ?string $commentary = null;

    public function getBookId(): Uuid
    {
        return $this->book_id;
    }

    public function getCommentary(): ?string
    {
        return $this->commentary;
    }
    public function getUserId(): Uuid
    {
        return $this->user_id;
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
