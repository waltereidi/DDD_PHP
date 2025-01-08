<?php
namespace App\Domain\Books;
use App\Domain\AggregateRoot;
use App\Domain\Books\Events\CreateBook;
use App\Domain\Books\Events\UserAddedBook;


class BookDomain extends AggregateRoot {
    
    public function __construct(BookId $bookId) {
        parent::__construct($bookId);
    }
    private function applyUserAddedBook(UserAddedBook $e) :void
    {
        

    }
    

}