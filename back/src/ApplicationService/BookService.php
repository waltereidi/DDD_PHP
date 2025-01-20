<?php
namespace App\ApplicationService;

use App\Contracts\UI\Pagination;
use App\Domain\Books\BookDomain;
use App\Domain\Books\BookId;
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
    protected function createBook(V1\CreateBook $request):?Book
    {
        $book = new BookDomain(BookId::create());
        
        return null;

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
