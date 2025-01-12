<?php
namespace App\Domain\Books;
use App\Domain\AggregateRoot;
use App\Domain\Books\Events\UserAddedBook;
use App\Repository\DomainRepository\BookDomainRepository;

use Symfony\Component\DependencyInjection\ContainerBuilder;

class BookDomain extends AggregateRoot {
    private readonly BookDomainRepository $bookDomainRepository;
    
    
    public function __construct(BookId $bookId ) 
    {
        parent::__construct($bookId);
    }
    private function applyUserAddedBook(UserAddedBook $e) :void
    {


    }
    

}