<?php

namespace App\Tests\Repository;
use App\Controller\Contracts\UI\Pagination;
use App\Entity\Category;
use App\Repository\DomainRepository\BookDomain\BookDomainRepository;
use Doctrine\Persistence\ManagerRegistry;
use Ramsey\Uuid\Uuid;
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
    public function testGetCategoriesByIdNotInBook()
    {
        $category = new Category();
        $category->id = Uuid::fromString('3fc7fd5c-406f-4bde-be8d-085ef3a8f2dc');
        $categories = array($category);

        $result = $this->repos
            ->getCategoriesByIdNotInBook([$category] , '3fc7fd5c-406f-4bde-be8d-085ef3a8f2dc', ['cat','cats']);
        
        assertNotNull($result);
            
    }
}
