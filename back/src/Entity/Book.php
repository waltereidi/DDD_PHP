<?php

namespace App\Entity;

use App\Domain\DomainEvent;
use App\Domain\DomainEventSubscriber;
use App\Repository\BookRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book extends Entity implements DomainEventSubscriber
{
    #[ORM\Column(length: 255)]
    private string $Title;

    #[ORM\Column(length: 4096)]
    private ?string $Description = null;

    #[ORM\Column(length: 13)]
    private string $ISBN;

    #[ORM\Column(length: 13, nullable: true)]
    private ?string $ISBN13 = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): static
    {
        $this->Title = $Title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    public function getISBN(): ?string
    {
        return $this->ISBN;
    }

    public function setISBN(string $ISBN): static
    {
        $this->ISBN = $ISBN;

        return $this;
    }

    public function getISBN13(): ?string
    {
        return $this->ISBN13;
    }

    public function setISBN13(?string $ISBN13): static
    {
        $this->ISBN13 = $ISBN13;

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
