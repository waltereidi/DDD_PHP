<?php
namespace App\Domain\Books;
use App\Domain\AggregateRoot;

class Book extends AggregateRoot {
    
    public function __construct(BookId $bookId) {
        $this->id = $bookId;
    }
    

}