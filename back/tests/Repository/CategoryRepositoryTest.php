<?php

namespace App\Tests\Repository;
use App\Repository\CategoryRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use function PHPUnit\Framework\assertNotNull;

class CategoryRepositoryTest extends KernelTestCase
{
   
    private CategoryRepository $categoryRepository;
    private ?ManagerRegistry $managerRegistry;
    
    protected function setUp(): void
    {
        $kernel = self::bootKernel();

        $this->managerRegistry = $kernel
            ->getContainer()
            ->get('doctrine');

        $this->categoryRepository = new CategoryRepository( $this->managerRegistry );
    }
    public function testInsertNewCategory() : void 
    {
        $category = $this->categoryRepository->getById(1);
        
        assertNotNull($category);
    }
    public function testGetByIdReturnsNull() : void 
    {
        $category = $this->categoryRepository->getById(1);
        
        assertNotNull($category);
    }
}
