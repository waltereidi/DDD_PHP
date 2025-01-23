<?php declare(strict_types=1);

use App\Domain\Books\BookDomain;
use App\Domain\Books\BookId;
use App\Domain\Books\Events\LoadBookDomain;
use App\Repository\DomainRepository\BookDomain\BookDomainRepository;
use Doctrine\Persistence\ManagerRegistry;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

final class BookTest extends KernelTestCase
{
    private BookDomainRepository $repos;
    private ?ManagerRegistry $managerRegistry;
    private BookDomain $domain;         
    protected function setUp(): void
    {
        $kernel = self::bootKernel();

        $this->managerRegistry = $kernel
            ->getContainer()
            ->get('doctrine');

        $this->repos = new BookDomainRepository( $this->managerRegistry );

        $this->domain = new BookDomain( BookId::create() , $this->repos);
    }

    public function testLoadDomainSubscribeEntities()
    {
        $books = $this->repos->bookRepository->findAll();
        $dbooks = $this->repos->bookCategoryRepository->findAll();
        $event = new LoadBookDomain(array_pop($books));
        $this->domain->apply($event);

    }
    
    
}