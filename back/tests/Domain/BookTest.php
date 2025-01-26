<?php declare(strict_types=1);

use App\Domain\Books\BookDomain;
use App\Domain\Books\BookId;
use App\Domain\Books\Events\LoadBookDomain;
use App\Repository\DomainRepository\BookDomain\BookDomainRepository;
use Doctrine\Persistence\ManagerRegistry;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;
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

        $getBook = $this->repos->getBookByIdAndLoadProxies(Uuid::fromString('3fc7fd5c-406f-4bde-be8d-085ef3a8f2dc'));

        $event = new LoadBookDomain($books[0]);
        $this->domain->apply($event);

    }
    
    
}