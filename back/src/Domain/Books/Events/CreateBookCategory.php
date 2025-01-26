<?php

namespace App\Domain\Books\Events;
use App\Domain\DomainEvent;
use Ramsey\Uuid\Lazy\LazyUuidFromString;
use Ramsey\Uuid\Uuid;

class CreateBookCategory implements DomainEvent
{
	private \DateTimeImmutable $occurredOn;
    private int $book_id;
    private int $category_id;
    private LazyUuidFromString $id;
	public function __construct(int $book_id , int $category_id)
	{
		$this->occurredOn = new \DateTimeImmutable();
        $this->book_id = $book_id;
        $this->category_id = $category_id;
	}
    public function getId(): LazyUuidFromString
    {
        return $this->id ;
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
