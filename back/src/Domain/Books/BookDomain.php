<?php
namespace App\Domain\Books;
use App\Domain\AggregateRoot;
use App\Domain\Books\Events\UserAddedBook;
use App\Repository\DomainRepository\BookDomainRepository;
use Doctrine\ORM\EntityManagerInterface;


class BookDomain extends AggregateRoot {
    private readonly BookDomainRepository $bookDomainRepository;
    public function __construct(BookId $bookId , EntityManagerInterface $entityManager) {
        parent::__construct($bookId);
        $entityManager->getRepository(BookDomainRepository::class)
    }
    private function applyUserAddedBook(UserAddedBook $e) :void
    {
        

    }
    

}