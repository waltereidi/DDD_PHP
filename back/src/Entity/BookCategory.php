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
    private Uuid $book_id;
    private Uuid  $category_id;

    public function getBookId(): ?Uuid
    {
        return $this->book_id;
    }

    public function getCategorId(): ?Uuid
    {
        return $this->category_id;
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
