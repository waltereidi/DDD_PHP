<?php
namespace App\Domain\Books;
use App\Domain\AggregateRoot;
use App\Domain\Books\Events\LoadBook;
use App\Domain\Books\Events\UserAddedBook;
use App\Domain\DomainEvent;
use App\Domain\DomainEventPublisher;
use App\Domain\Books\Events\LoadCategories;
use App\Entity as Entity;

use App\Entity\Book;
use App\Repository\DomainRepository\BookDomain\BookDomainRepository;
use Ramsey\Uuid\Lazy\LazyUuidFromString;
use Ramsey\Uuid\Uuid;

class BookDomain extends AggregateRoot 
{
    protected readonly BookDomainRepository $repository;        
    private readonly DomainEventPublisher $subscriber; 
    
    public function __construct(BookId $bookId  , BookDomainRepository $repository ) 
    {
        parent::__construct($bookId);
        $this->repository = $repository;
        $this->subscriber = DomainEventPublisher::instance();
    }
    
    public function apply(DomainEvent $e): void
    {
        $this->recordApplyAndPublishThat($e);
    }

    protected function applyLoadBookDomain(LoadBook $e)
    {
        
        $this->subscriber->subscribe($e->book);
        
        $bookcategories =$e->book->book_categories;

        array_walk($bookcategories ,fn($item)
            => $this->subscriber->subscribe($item) );
        
        array_walk($bookcategories ,fn($item)
            => $this->subscriber->subscribe($item));

        $readingNow = $e->book->reading_now;

        array_walk($readingNow , fn($item) 
            => $this->subscriber->subscribe($item));
        
        $bookReader = $e->book->book_reader;

        array_walk($bookReader , fn($item) 
            => $this->subscriber->subscribe($item));
        
    }
    protected function applyLoadCategories( LoadCategories $e):void 
    {
        $identifiedCategories = $e->getCategoriesWithId();
        
        array_walk($identifiedCategories ,fn($item)
            => $this->subscriber->subscribe($item));                 
    }
    public function saveEntities()
    {
        $this->repository->manager->getConnection()
            ->beginTransaction();
        try{


            $this->repository->manager->getConnection()
                ->commit();

        }catch(\Exception $e){
            $this->repository->manager->getConnection()
                ->rollback();
        }
    }
 
    protected function applyUserAddedBook(UserAddedBook $e) :void
    {
        $book = $e->getCreateBook();
        if($book->id == null)
        {
            $book->id = Uuid::uuid4()->toString();   
            $bookEntity = new Book();
            $bookEntity->id = Uuid::fromString($book->id); 
            $this->subscriber->subscribe($bookEntity);
        }
    }
    

}