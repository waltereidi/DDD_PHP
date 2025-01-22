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
    /** @var Entity\Category */
    protected array $categories; 
    /** @var Entity\BookReader */
    protected array $bookReader;
    /** @var Entity\UserBookReadingNow */
    protected array $userBookReadingNow;
    public function getBook():Entity\Book 
    {
        return $this->book;
    }
    public function apply(DomainEvent $e): void
    {
        $this->recordApplyAndPublishThat($e);
    }

    protected function applyLoadDomain(LoadBookDomain $e){
        $this->book = $e->book;
        $this->categories = $e->book->getCategories();
        $this->userBookReadingNow = $e->book->getReadingNow();
        $this->bookReader = $e->book->getBookReader();
    }
    public function saveEntities()
    {
        $this->repository->manager->getConnection()
            ->beginTransaction();
        try{


            $this->repository->manager ->getConnection()
                ->commit();

        }catch(\Exception $e){
            $this->repository->manager ->getConnection()
                ->rollback();
        }
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