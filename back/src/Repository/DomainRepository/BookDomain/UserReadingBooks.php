<?php 

namespace App\Repository\DomainRepository\BookDomain;

use App\Repository as Repository;
use Doctrine\ORM\QueryBuilder;
use \Doctrine\ORM\Query\Expr as Expr;
 class UserReadingBooks 
 {
    private Repository\BookRepository $bookRepository;
    private Repository\BookCategoryRepository $bookCategoryRepository;
    private Repository\UserBookReadingNowRepository $userBookReadingNowRepository;
    private Repository\UserRepository $userRepository;
    private Repository\BookReaderRepository $bookReaderRepository;

    private function __construct(
        Repository\BookRepository $book,
        Repository\BookCategoryRepository $bookCategory,
        Repository\UserBookReadingNowRepository $userBookReadingNow, 
        Repository\UserRepository $user,
        Repository\BookReaderRepository $bookReader
    ){
        $this->bookRepository = $book;
        $this->bookCategoryRepository = $bookCategory;
        $this->userBookReadingNowRepository = $userBookReadingNow;
        $this->userRepository = $user;
        $this->bookReaderRepository = $bookReader;
    }
    public function getMainPageBooks(int $page , $pageSize)
    {
        return $this->base_query()
            ->select('');
    }
    
    
    private function base_query() : QueryBuilder
    {
        return $this->bookRepository
        ->createQueryBuilder('b')
        ->join(
            join: 'App\Entity\BookCategory',
            alias: 'bc',
            conditionType: Expr\Join::WITH,
            condition: 'bc.book_id = b.id'
        )
        ->leftjoin(
            join: 'App\Entity\User',
            alias: 'u',
            conditionType: Expr\Join::WITH,
            condition: 'u.id = ubrn.user_id'
        );
    }

 }