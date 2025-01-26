<?php 
namespace App\Domain\Books\Events;

use App\Domain\DomainEvent;
use App\Entity\Book;

class LoadBookDomain implements DomainEvent
{
    public Book $book;
    private \DateTimeImmutable $occurredOn;
    public function occurredOn(): \DateTimeImmutable
	{
		return $this->occurredOn;
	}

    public function __construct(Book $book){
        $this->occurredOn = new \DateTimeImmutable();
        $this->book = $book;
    }
}