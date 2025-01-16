<?php
namespace App\ApplicationService;

use App\Domain\Books\BookDomain;
use App\Repository\DomainRepository\BookDomainRepository;
use Symfony\Component\HttpKernel\KernelInterface;
use App\ApplicationService\ApplicationServiceInterface;
use App\Contracts\Home\V1 as V1;
class BookService implements ApplicationServiceInterface
{
    protected readonly KernelInterface $kernel;
    protected readonly BookDomainRepository $repository;
    protected readonly BookDomain $domain;
    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
        
        $managerRegistry = $kernel
            ->getContainer()
            ->get('doctrine');
        
        $this->repository = new BookDomainRepository($managerRegistry);

    }
    //TODO add objects contracts delegated from controller
    public function handle(object $command): object
    {
        switch($command::class)
        {
            case V1\GetLeftBarCategories::class: return $this->getLeftBarCategories($command);
            case V1\GetMainPageBooks::class: return $this->getMainPageBooks($command);
            default: throw new \InvalidArgumentException('Invalid command '.$command::class);
        }
    }
    protected function getLeftBarCategories(V1\GetBooks $command) : object
    {
        return $this
            ->repository
            ->getLeftBarCategories();
    }
    protected function getMainPageBooks(V1\GetBooksAndCategories $command) : object
    {

    }

}
