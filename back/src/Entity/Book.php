<?php

namespace App\Entity;

use App\Domain\DomainEvent;
use App\Domain\DomainEventSubscriber;
use App\Repository\BookRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book extends Entity implements DomainEventSubscriber
{
    private string $title;
    private ?string $description = null;
    private string $isbn;
    private ?string $isbn13 = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

        public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function getIsbn13(): ?string
    {
        return $this->isbn13;
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
