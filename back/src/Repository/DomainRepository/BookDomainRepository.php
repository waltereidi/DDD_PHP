<?php 

namespace App\Repository\DomainRepository;

use App\Entity\Book;
use App\Entity\BookCategory;
use App\Entity\BookReader;
use App\Entity\Category;
use App\Entity\User;
use App\Entity\UserBookReadingNow;
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
    


}
