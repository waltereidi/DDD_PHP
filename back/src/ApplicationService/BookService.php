<?php
namespace App\ApplicationService;

use App\Domain\Books\BookDomain;
use App\Repository\DomainRepository\BookDomainRepository;
use Symfony\Component\HttpKernel\KernelInterface;
use  App\ApplicationService\ApplicationServiceInterface;
class BookService implements ApplicationServiceInterface
{
    protected readonly KernelInterface $kernel;
    protected readonly BookDomainRepository $repository;

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
            case BookDomain::class: return $command;
        }
    }

}
