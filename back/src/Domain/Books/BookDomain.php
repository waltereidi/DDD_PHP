<?php
namespace App\Domain\Books;
use App\Domain\AggregateRoot;
use App\Domain\Books\Events\LoadBookDomain;
use App\Domain\Books\Events\UserAddedBook;
use App\Domain\DomainEvent;
use App\Entity as Entity;
use App\Repository\DomainRepository\BookDomain\BookDomainRepository;


class BookDomain extends AggregateRoot {

    protected readonly BookDomainRepository $repository;    
    protected Entity\Book $book;
    /**
     * Refers to categories assigned to this book
     * @var Entity\Category
     */
    protected array $categories; 
    /**
     * Refers to users who added notes to this book
     * @var Entity\BookReader
     */
    protected array $bookReader;
    /**
     * Refers to user reading this book now
     * @var Entity\UserBookReadingNow
     */
    protected array $userBookReadingNow;
    protected function applyLoadDomain(LoadBookDomain $book){
        $this->book = $book->book;
        $this->categories = $book->book;

    }

    public function __construct(BookId $bookId  , BookDomainRepository $repository ) 
    {
        parent::__construct($bookId);
        $this->repository = $repository;
    }
    protected function applyUserAddedBook(UserAddedBook $e) :void
    {


    }
    

}