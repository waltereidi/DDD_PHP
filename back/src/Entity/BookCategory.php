<?php

namespace App\Entity;

use App\Domain\DomainEvent;
use App\Domain\DomainEventSubscriber;
use App\Repository\BookCategoryRepository;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

#[ORM\Entity(repositoryClass: BookCategoryRepository::class)]
class BookCategory extends Entity implements DomainEventSubscriber
{
    
    #[ORM\OneToOne(targetEntity: User::class, mappedBy: 'BookCategory')]
    #[ORM\Column(type: "UuidType")]
    private Uuid $book_id;

    #[ORM\OneToOne(targetEntity: User::class, mappedBy: 'BookCategory')]
    #[ORM\Column(type: "UuidType")]
    private Uuid  $categor_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBookId(): ?Uuid
    {
        return $this->book_id;
    }

    public function getCategorId(): ?Uuid
    {
        return $this->categor_id;
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
