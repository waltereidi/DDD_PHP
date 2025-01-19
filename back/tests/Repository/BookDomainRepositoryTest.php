<?php

namespace App\Tests\Repository;
use App\Contracts\UI\Pagination;
use App\Repository\DomainRepository\BookDomain\BookDomainRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use function PHPUnit\Framework\assertNotNull;

class BookDomainRepositoryTest extends KernelTestCase
{
    private BookDomainRepository $repos;
    private ?ManagerRegistry $managerRegistry;
        
    protected function setUp(): void
    {
        $kernel = self::bootKernel();

        $this->managerRegistry = $kernel
            ->getContainer()
            ->get('doctrine');

        $this->repos = new BookDomainRepository( $this->managerRegistry );
    }
    public function testGetMainPage()
    {
        $result = $this->repos
            ->getMainPageBooks(new Pagination(1 , 10));

        assertNotNull($result);
    }
    public function testGetLeftSideCategories()
    {
        $result = $this->repos
            ->getLeftSideCategories();
            
        assertNotNull($result);
    }

}
