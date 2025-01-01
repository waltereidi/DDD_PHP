<?php

namespace App\Domain\Books;

use App\Domain\AggregateRootId;

class BookId extends AggregateRootId
{
    public function __construct(string $id)
    {
        $this->id = $id;
    }

}