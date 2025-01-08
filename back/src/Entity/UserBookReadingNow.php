<?php

namespace App\Entity;

use App\Domain\DomainEvent;
use App\Domain\DomainEventSubscriber;
use App\Repository\UserBookReadingNowRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserBookReadingNowRepository::class)]
class UserBookReadingNow extends Entity implements DomainEventSubscriber
{
    
    #[ORM\Column]
    #[ORM\OneToOne(targetEntity: User::class, mappedBy: 'UserBookReadingNow')]
    private int $user_id;

    #[ORM\Column]
    #[ORM\OneToOne(targetEntity: Book::class, mappedBy: 'UserBookReadingNow')]
    private int $book_id;

    #[ORM\Column]
    private bool $active = true;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }
    public function getBookId(): ?int
    {
        return $this->book_id;
    }
    public function isActive(): ?bool
    {
        return $this->active;
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
