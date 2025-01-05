<?php

namespace App\Entity;

use App\Domain\DomainEvent;
use App\Domain\DomainEventSubscriber;
use App\Repository\BookCategoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookCategoryRepository::class)]
class BookCategory extends Entity implements DomainEventSubscriber
{
    
    #[ORM\Column]
    #[ORM\OneToOne(targetEntity: User::class, mappedBy: 'BookCategory')]
    private int $book_id;

    #[ORM\Column]
    #[ORM\OneToOne(targetEntity: User::class, mappedBy: 'BookCategory')]
    private int $categor_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBookId(): ?int
    {
        return $this->book_id;
    }

    public function setBookId(int $book_id): static
    {
        $this->book_id = $book_id;

        return $this;
    }

    public function getCategorId(): ?int
    {
        return $this->categor_id;
    }

    public function setCategorId(int $categor_id): static
    {
        $this->categor_id = $categor_id;

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
