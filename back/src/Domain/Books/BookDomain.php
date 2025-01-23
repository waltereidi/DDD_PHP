<?php
namespace App\Domain\Books;
use App\Domain\AggregateRoot;
use App\Domain\Books\Events\LoadBookDomain;
use App\Domain\Books\Events\UserAddedBook;
use App\Domain\DomainEvent;
use App\Domain\DomainEventPublisher;
use App\Domain\DomainEventSubscriber;
use App\Entity as Entity;
use App\Entity\Book;
use App\Entity\BookCategory;
use App\Entity\BookReader;
use App\Entity\Category;
use App\Entity\UserBookReadingNow;
use App\Repository\DomainRepository\BookDomain\BookDomainRepository;

class BookDomain extends AggregateRoot 
{
    protected readonly BookDomainRepository $repository;    
    protected Entity\Book $book;
    /** @var Entity\Category */
    protected array $categories; 
    /** @var Entity\BookReader */
    protected array $bookReader;
    /** @var Entity\UserBookReadingNow */
    protected array $userBookReadingNow;
    private readonly DomainEventPublisher $subscriber; 
    public function __construct(BookId $bookId  , BookDomainRepository $repository ) 
    {
        parent::__construct($bookId);
        $this->repository = $repository;
        $this->subscriber = DomainEventPublisher::instance();


    }
    public function getBook():Entity\Book 
    {
        return $this->book;
    }
    public function apply(DomainEvent $e): void
    {
        $this->recordApplyAndPublishThat($e);
    }

    protected function applyLoadDomain(LoadBookDomain $e){
        $this->subscriber->subscribe($e->book);
        
        $this->categories = $e->book->getCategories();
        $this->userBookReadingNow = $e->book->getReadingNow();
        $this->bookReader = $e->book->getBookReader();

        
        $this->subscriber->subscribe(new BookReader());
        $this->subscriber->subscribe(new UserBookReadingNow());
        $this->subscriber->subscribe(new Category());
        $this->subscriber->subscribe(new BookCategory());
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
 
    protected function applyUserAddedBook(UserAddedBook $e) :void
    {


    }
    

}