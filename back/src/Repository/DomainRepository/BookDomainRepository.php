<?php 

namespace App\Repository\DomainRepository;

use App\Repository as Repository;
use Symfony\Bridge\Doctrine\ManagerRegistry;

class BookDomainRepository {

    public readonly Repository\BookRepository $bookRepository;
    public readonly Repository\BookCategoryRepository $bookCategoryRepository;
    public readonly Repository\CategoryRepository $categoryRepository;
    public readonly Repository\UserBookReadingNowRepository $userBookReadingNowRepository;
    public readonly Repository\UserRepository $userRepository;
    public readonly Repository\BookReaderRepository $bookReaderRepository;
    
    public function __construct(ManagerRegistry $managerRegistry){
        $this->bookRepository =  new Repository\BookRepository($managerRegistry);
        $this->bookCategoryRepository =  new Repository\BookCategoryRepository($managerRegistry);
        $this->categoryRepository =  new Repository\CategoryRepository($managerRegistry);
        $this->userBookReadingNowRepository =  new Repository\UserBookReadingNowRepository($managerRegistry);
        $this->userRepository =  new Repository\UserRepository($managerRegistry);
        $this->bookReaderRepository =  new Repository\BookReaderRepository($managerRegistry);
    }



}
