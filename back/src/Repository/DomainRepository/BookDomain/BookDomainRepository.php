<?php 

namespace App\Repository\DomainRepository\BookDomain;

use App\Contracts\UI\Pagination;
use App\Entity\Book;
use App\Repository as Repository;
use Doctrine\Persistence\ManagerRegistry;
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
    public function getMainPageBooks(Pagination $pagination): array
    {
        return $this->bookRepository
            ->createQueryBuilder('b')
            ->setFirstResult($pagination->getOffSet())
            ->setMaxResults($pagination->getMaxResults())
            ->getQuery()
            ->getResult();
    }
    public function getLeftSideCategories() : array
    {
        return $this->bookCategoryRepository
            ->createQueryBuilder('bc')
            ->select('count(bc.book_id)' , 'bc.category_id')
            ->groupBy('bc.category_id')
            ->getQuery()
            ->getResult();
    }
}
