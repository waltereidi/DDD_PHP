<?php

namespace App\Domain\Books\Events;
use App\Domain\DomainEvent;
use Ramsey\Uuid\Lazy\LazyUuidFromString;
use Ramsey\Uuid\Uuid;

class CreateUserBookReadingNow implements DomainEvent
{
	private \DateTimeImmutable $occurredOn;
    private int $book_id;
    private int $user_id;
    private bool $active;
    private LazyUuidFromString $id;
	public function __construct(int $book_id , int $user_id , ?bool $active)
	{
		$this->occurredOn = new \DateTimeImmutable();
        $this->book_id = $book_id;
        $this->user_id = $user_id;
        $this->active = $active ?? false;
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
    public function active(): bool
    {
        return $this->active;
    }
}
