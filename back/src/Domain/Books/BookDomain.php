<?php
namespace App\Domain\Books;
use App\Domain\AggregateRoot;
use App\Domain\Books\Events as Events;
use App\Domain\Books\Events\CreateNewBook;
use App\Domain\Books\Events\CreateNewCategory;

class BookDomain extends AggregateRoot {
    


    public function __construct(BookId $bookId) {
        parent::__construct($bookId);
    }
    private function applyCreateNewBook(CreateNewBook $e) :void
    {
        

    }
    

}