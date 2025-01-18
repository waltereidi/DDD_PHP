<?php 

namespace App\Repository\DomainRepository;

use App\Contracts\Home\V1\GetLeftBarCategories;
use App\Entity\Book;
use App\Entity\BookCategory;
use App\Entity\BookReader;
use App\Entity\Category;
use App\Entity\User;
use App\Entity\UserBookReadingNow;
use App\Repository as Repository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use \Doctrine\ORM\Query\Expr as Expr;

class BookDomainRepository 

{

    public readonly Repository\BookRepository $bookRepository;
    public readonly Repository\BookCategoryRepository $bookCategoryRepository;
    public readonly Repository\CategoryRepository $categoryRepository;
    public readonly Repository\UserBookReadingNowRepository $userBookReadingNowRepository;
    public readonly Repository\UserRepository $userRepository;
    public readonly Repository\BookReaderRepository $bookReaderRepository;

    public function __construct(ManagerRegistry $registry)
    {
        $this->bookRepository = new Repository\BookRepository($registry);
        $this->bookCategoryRepository = new Repository\BookCategoryRepository($registry);
        $this->categoryRepository = new Repository\CategoryRepository($registry); 
        $this->userBookReadingNowRepository = new Repository\UserBookReadingNowRepository($registry);
        $this->userRepository = new Repository\UserRepository($registry); 
        $this->bookReaderRepository = new Repository\BookReaderRepository($registry); 
    }

    
    public function getMainPageBooks()
    {
        return $this->getMainPageBooks_query()
            ->select('');
    }
    
    private function booksCategoryUserBookReadingNow_query() : QueryBuilder
    {
        return $this->bookRepository
        ->createQueryBuilder('b')
        ->join(
            join: 'App\Entity\BookCategory',
            alias: 'bc',
            conditionType: Expr\Join::WITH,
            condition: 'bc.book_id = b.id'
        )
        ->leftjoin( join: 'App\Entity\UserBookReadingNow',
            alias: 'ubrn',
            conditionType: Expr\Join::WITH ,
            condition: 'ubrn.book_id = b.id'
        )
        ->leftjoin(
            join: 'App\Entity\User',
            alias: 'u',
            conditionType: Expr\Join::WITH,
            condition: 'u.id = ubrn.user_id'
        );
    }
    
    public function getLeftBarCategories()
    {
        return $this->getLeftBarCategories_query()
            ->groupBy('cat.id', 'cat.name')
            ->select('cat.name' , 'count(cat.name)')
            ->orderBy('cat.name')
            ->getQuery()
            ->getResult();
    }
    private function booksWithCategory_query():QueryBuilder 
    {
        return $this->categoryRepository
            ->createQueryBuilder('cat')
            ->join(join: 'App\Entity\BookCategory'
            , alias: 'bc' 
            ,conditionType: Expr\Join::WITH 
            ,condition: 'bc.category_id = cat.id')
            ->join('App\Entity\Book', 
                'b' , 
                Expr\Join::WITH , 
                condition: 'b.id = bc.book_id'
            );
    }
}
