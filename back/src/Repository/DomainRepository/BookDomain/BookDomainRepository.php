<?php 

namespace App\Repository\DomainRepository\BookDomain;

use App\Repository as Repository;
use Doctrine\Persistence\ManagerRegistry;

class BookDomainRepository implements BookDomainRepositoryInterface
{
    private readonly Repository\BookRepository $bookRepository;
    private readonly Repository\BookCategoryRepository $bookCategoryRepository;
    private readonly Repository\CategoryRepository $categoryRepository;
    private readonly Repository\UserBookReadingNowRepository $userBookReadingNowRepository;
    private readonly Repository\UserRepository $userRepository;
    private readonly Repository\BookReaderRepository $bookReaderRepository;

    public function __construct(ManagerRegistry $registry)
    {
        $this->bookRepository = new Repository\BookRepository($registry);
        $this->bookCategoryRepository = new Repository\BookCategoryRepository($registry);
        $this->categoryRepository = new Repository\CategoryRepository($registry); 
        $this->userBookReadingNowRepository = new Repository\UserBookReadingNowRepository($registry);
        $this->userRepository = new Repository\UserRepository($registry); 
        $this->bookReaderRepository = new Repository\BookReaderRepository($registry); 
    }

    public function getUserReadingBooks() : UserReadingBooks   
    {
        return new UserReadingBooks(        
            book: $this->bookRepository, 
            bookCategory: $this->bookCategoryRepository, 
            userBookReadingNow: $this->userBookReadingNowRepository, 
            user: $this->userRepository, 
            bookReader: $this->bookReaderRepository
        );
    }
    
    public function getCategoryBooks() : CategoryBooks
    {
        return new CategoryBooks(
            category: $this->categoryRepository,
            bookCategory: $this->bookCategoryRepository
        );
    }
}
