<?php

namespace App\Domain\Books\Events;
use App\Domain\DomainEvent;
use Ramsey\Uuid\Lazy\LazyUuidFromString;
use Ramsey\Uuid\Uuid;

class CreateBookReader implements DomainEvent
{
    private LazyUuidFromString $id ;
	private \DateTimeImmutable $occurredOn;
    private LazyUuidFromString $user_id;
    private ?string $commentary;
	public function __construct(LazyUuidFromString $user_id , ?string $commentary )
	{
        $this->id = Uuid::uuid4();
		$this->occurredOn = new \DateTimeImmutable();
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

    public function user_id(): LazyUuidFromString
    {
        return $this->user_id;
    }
    public function commentary(): ?string
    {
        return $this->commentary;
    }
}
