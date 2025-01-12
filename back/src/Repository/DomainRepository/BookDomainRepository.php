<?php 

namespace App\Repository\DomainRepository;

use App\Entity\Book;
use App\Entity\BookCategory;
use App\Entity\BookReader;
use App\Entity\Category;
use App\Entity\User;
use App\Entity\UserBookReadingNow;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class BookDomainRepository {

    public readonly EntityRepository $bookRepository;
    public readonly EntityRepository $bookCategoryRepository;
    public readonly EntityRepository $categoryRepository;
    public readonly EntityRepository $userBookReadingNowRepository;
    public readonly EntityRepository $userRepository;
    public readonly EntityRepository $bookReaderRepository;
    
    public function __construct(EntityManagerInterface $entityManagerInterface){
        $this->bookRepository = $entityManagerInterface->getRepository(Book::class);
        $this->bookCategoryRepository = $entityManagerInterface->getRepository(BookCategory::class);
        $this->categoryRepository = $entityManagerInterface->getRepository(Category::class);
        $this->userBookReadingNowRepository = $entityManagerInterface->getRepository(UserBookReadingNow::class);
        $this->userRepository = $entityManagerInterface->getRepository(User::class);
        $this->bookReaderRepository = $entityManagerInterface->getRepository(BookReader::class);
    }



}
