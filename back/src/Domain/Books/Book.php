<?php
namespace App\Domain\Books;
use App\Domain\AggregateRoot;
use App\Domain\Books\Events as Events;
use App\Domain\Books\Events\CreateNewCategory;

class Book extends AggregateRoot {
    
    public function __construct(BookId $bookId) {
        parent::__construct($bookId);
    }
    public function testeEvent():void
    {
        $e = new Events\CreateNewCategory("TestCase",null , null);
        $this->recordApplyAndPublishThat($e);
    }
    

}