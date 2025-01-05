<?php

namespace App\Entity;

use App\Domain\DomainEvent;
use App\Domain\DomainEventSubscriber;
use App\Repository\BookReaderRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookReaderRepository::class)]
class BookReader extends Entity implements DomainEventSubscriber
{
    #[ORM\Column]
    #[ORM\OneToOne(targetEntity: Book::class, mappedBy: 'BookReader')]
    private int $book_id;
    
    #[ORM\Column]
    #[ORM\OneToOne(targetEntity: User::class, mappedBy: 'BookReader')]
    private int $user_id;

    #[ORM\Column(length: 4096, nullable: true)]
    private ?string $commentary = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBookId(): ?int
    {
        return $this->book_id;
    }

    public function setBookId(int $book_id): BookReader
    {
        $this->book_id = $book_id;

        return $this;
    }

    public function getCommentary(): ?string
    {
        return $this->commentary;
    }

    public function setCommentary(?string $commentary): BookReader
    {
        $this->commentary = $commentary;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): BookReader
    {
        $this->user_id = $user_id;

        return $this;
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
