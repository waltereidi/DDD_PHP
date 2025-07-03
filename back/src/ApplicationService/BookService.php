<?php
namespace App\ApplicationService;

use ApiPlatform\Metadata\Exception\ItemNotFoundException;
use App\Controller\Contracts\UI\Pagination;
use App\Domain\Books\BookDomain;
use App\Domain\Books\BookId;
use App\Domain\Books\Events\CreateBook;
use App\Domain\Books\Events\LoadBook;
use App\Domain\Books\Events\UserAddedBook;
use App\Entity\Book;
use App\Domain\Books\Events\LoadCategories;
use App\Session\Session;
use Symfony\Component\HttpKernel\KernelInterface;
use App\ApplicationService\ApplicationServiceInterface;
use App\Controller\Contracts\Home\V1 as V1;
use App\Repository\DomainRepository\BookDomain\BookDomainRepository;
use App\Domain\Books\Events\CreateBookReader;
class BookService implements ApplicationServiceInterface
{
    protected readonly KernelInterface $kernel;
    protected readonly BookDomainRepository $repository;
    protected BookDomain $domain;
    protected Session $session; 
    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
        
        $managerRegistry = $kernel
            ->getContainer()
            ->get('doctrine');
        
        $this->repository = new BookDomainRepository($managerRegistry);

        $this->domain = new BookDomain(BookId::create() , $this->repository);
        
        $this->session = new Session();
    }

    //TODO add objects contracts delegated from controller
    public function handle(?object $contract ,string $command):mixed
    {
        $class = get_class($contract);
        
        switch($command)
        {
            case 'getLeftBarCategories' : return $this->getLeftBarCategories();
            case 'getMainPageBooks' : return $this->getMainPageBooks($contract);
            case V1\UserAddedBook::class: return $this->createBook($contract);
            default: throw new \InvalidArgumentException('Invalid command '.$command);
        }
    }
    
    protected function createBook(V1\UserAddedBook $request):Book
    {
        $book = null ; 
        if($request->id != null ){
            
            $book = $this->repository
                ->bookRepository
                ->findOneBy(['id'=> $request->id]) 
                ?? throw new ItemNotFoundException("could not find". $request->id);            
    
            $this->domain->apply(new LoadBook($book));
        }
        $createBook = new CreateBook(
            $request->id , 
            $request->title , 
            $request->description , 
            $request->isbn , 
            $request->isbn13  
        );        
        $this->domain->apply($createBook );


        
        $loadCategories = null; 
        if( count($request->categories) > 0 )
        {
            $loadCategories = new LoadCategories($request->categories);
        
            $categoriesToReplace = $this->repository
                ->getCategoriesByIdNotInBook($loadCategories->getCategoriesWithId()
                    ,$request->id );
                    

            $loadCategories->replaceCategories( $categoriesToReplace );
            
            $this->domain->apply($loadCategories);
        }
        
        if($request->reading_now == true )
        {
            $createBookReader = new CreateBookReader(
                $this->session->getUser_id(), 
                $request->commentary
            );
            $this->domain->apply($createBookReader);
        }

        


        $this->domain->saveEntities();

        return throw new \Exception();
    }

    protected function getLeftBarCategories() : array
    {
        return $this
            ->repository
            ->getLeftSideCategories();
    }
    protected function getMainPageBooks(Pagination $pagination) : array
    {
        return $this
            ->repository
            ->getMainPageBooks($pagination);
    }

    


}
