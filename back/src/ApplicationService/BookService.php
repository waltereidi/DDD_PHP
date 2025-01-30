<?php
namespace App\ApplicationService;

use ApiPlatform\Metadata\Exception\ItemNotFoundException;
use App\Contracts\UI\Pagination;
use App\Domain\Books\BookDomain;
use App\Domain\Books\BookId;
use App\Domain\Books\Events\LoadBook;
use App\Entity\Book;
use App\Domain\Books\Events\LoadCategories;
use Symfony\Component\HttpKernel\KernelInterface;
use App\ApplicationService\ApplicationServiceInterface;
use App\Controller\Contracts\Home\V1 as V1;
use App\Repository\DomainRepository\BookDomain\BookDomainRepository;

class BookService implements ApplicationServiceInterface
{
    protected readonly KernelInterface $kernel;
    protected readonly BookDomainRepository $repository;
    protected BookDomain $domain;
    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
        
        $managerRegistry = $kernel
            ->getContainer()
            ->get('doctrine');
        
        $this->repository = new BookDomainRepository($managerRegistry);

        $this->domain = new BookDomain(BookId::create() , $this->repository);
        
    }

    //TODO add objects contracts delegated from controller
    public function handle(?object $contract ,string $command):mixed
    {
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
        
        $loadCategories = null; 
        if( count($request->categories) > 0 )
        {
            $loadCategories = new LoadCategories($request->categories);
        
            $categoriesToReplace = $this->repository
                ->getCategoriesById($loadCategories->getCategoriesWithId());

            $loadCategories->replaceCategories( $categoriesToReplace );
            $this->domain->apply($loadCategories);
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
