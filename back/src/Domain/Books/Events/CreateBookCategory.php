<?php

namespace App\Domain\Books\Events;
use App\Domain\DomainEvent;

class CreateBookCategory implements DomainEvent
{
	private \DateTimeImmutable $occurredOn;
    private int $book_id;
    private int $category_id;
	public function __construct(int $book_id , int $categor_id)
	{
		$this->occurredOn = new \DateTimeImmutable();
        $this->book_id = $book_id;
        $this->category_id = $categor_id;
	}
    
	public function occurredOn(): \DateTimeImmutable
	{
		return $this->occurredOn;
	}
    public function book_id(): int
    {
        return $this->book_id;
    }
    public function category_id(): int
    {
        return $this->category_id;
    }
}
