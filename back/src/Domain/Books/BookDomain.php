<?php
namespace App\Domain\Books;
use App\Domain\AggregateRoot;
use App\Domain\Books\Events\LoadBookDomain;
use App\Domain\Books\Events\UserAddedBook;
use App\Domain\DomainEvent;
use App\Domain\DomainEventPublisher;
use App\Entity as Entity;

use App\Repository\DomainRepository\BookDomain\BookDomainRepository;

class BookDomain extends AggregateRoot 
{
    protected readonly BookDomainRepository $repository;        
    private readonly DomainEventPublisher $subscriber; 
    
    /** @var BookDomainSubscribedIndex */
    private array $subscribedIndex = [];
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

    protected function applyLoadBookDomain(LoadBookDomain $e)
    {
        
        $this->subscriber->subscribe($e->book);
        
        $bookcategories =$e->book->getBookCategories();

        array_walk($bookcategories ,fn($item)
            => array_push($item->id   ,$this->subscriber->subscribe($item) ));
        
        array_walk($bookcategories ,fn($item)
            => array_push($item->id   ,$this->subscriber->subscribe($item) ));

        $readingNow = $e->book->getReadingNow();

        array_walk($readingNow , fn($item) 
            => array_push($item->id   ,$this->subscriber->subscribe($item) ));
        
        $bookReader = $e->book->getBookReader();

        array_walk($bookReader , fn($item) 
            => array_push($item->id   ,$this->subscriber->subscribe($item) ));
        
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

        
        
                        

    }
    

}