<?php

namespace App\Domain\Books\Events;
use App\Domain\DomainEvent;
use Ramsey\Uuid\Lazy\LazyUuidFromString;
use Ramsey\Uuid\Uuid;

class CreateBookReader implements DomainEvent
{
    private LazyUuidFromString $id ;
	private \DateTimeImmutable $occurredOn;
    private int $book_id;
    private int $user_id;
    private ?string $commentary;
	public function __construct(string $id ,int $book_id , int $user_id , ?string $commentary)
	{
        $this->id = Uuid::fromString($id);
		$this->occurredOn = new \DateTimeImmutable();
        $this->book_id = $book_id;
        $this->user_id = $user_id;
        $this->commentary = $commentary;
	}
    public function getId(): LazyUuidFromString
    {
        return $this->id;
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
