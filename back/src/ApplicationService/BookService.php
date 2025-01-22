<?php
namespace App\ApplicationService;

use ApiPlatform\Metadata\Exception\ItemNotFoundException;
use App\Contracts\UI\Pagination;
use App\Domain\Books\BookDomain;
use App\Domain\Books\BookId;
use App\Domain\Books\Events\LoadBookDomain;
use App\Entity\Book;
use Symfony\Component\HttpKernel\KernelInterface;
use App\ApplicationService\ApplicationServiceInterface;
use App\Contracts\Home\V1 as V1;
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
        

        $this->domain = new BookDomain(BookId::create() , $this->repository);
        
        $this->repository = new BookDomainRepository($managerRegistry);
    }

    //TODO add objects contracts delegated from controller
    public function handle(?object $contract ,string $command):mixed
    {
        switch($command)
        {
            case 'getLeftBarCategories' : return $this->getLeftBarCategories();
            case 'getMainPageBooks' : return $this->getMainPageBooks($contract);
            case V1\CreateBook::class: return $this->createBook($contract);
            default: throw new \InvalidArgumentException('Invalid command '.$command);
        }
    }
    protected function createBook(V1\CreateBook $request):Book
    {
        if($request->book->id != null ){
            
            $book = $this->repository
                ->bookRepository
                ->findOneBy(['id'=> $request->book->id]) 
                ?? throw new ItemNotFoundException("could not find". $request->book->id);            
        }

        $this->domain->apply(new LoadBookDomain($book));

        $this->domain->saveEntities();

        return $this->repository
            ->bookRepository
            ->findOneBy(['id' => $this->domain->getBook()->id]);      
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
