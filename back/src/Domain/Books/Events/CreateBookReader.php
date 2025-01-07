<?php

namespace App\Domain\Books\Events;
use App\Domain\DomainEvent;

class CreateBookReader implements DomainEvent
{
	private \DateTimeImmutable $occurredOn;
    private int $book_id;
    private int $user_id;
    private ?string $commentary;
	public function __construct(int $book_id , int $user_id , ?string $commentary)
	{
		$this->occurredOn = new \DateTimeImmutable();
        $this->book_id = $book_id;
        $this->user_id = $user_id;
        $this->commentary = $commentary;
	}
    
	public function occurredOn(): \DateTimeImmutable
	{
		return $this->occurredOn;
	}
    public function book_id(): int
    {
        return $this->book_id;
    }
    public function user_id(): int
    {
        return $this->user_id;
    }
    public function commentary(): ?string
    {
        return $this->commentary;
    }
}
