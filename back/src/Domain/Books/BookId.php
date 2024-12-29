<?php

namespace App\Domain\Books;
use Ramsey\Uuid\Uuid;

class BookId
{
    private string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public static function create(): BookId
    {
        return new static(Uuid::uuid4()->toString());
    }

    public function id(): string
    {
        return $this->id;
    }

    public function __toString()
    {
        return $this->id;
    }
}