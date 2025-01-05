<?php

namespace App\Tests\Repository;
use App\Domain\Books\Events\CreateNewCategory;
use App\Entity\Category;
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
    public function testAddNew(){
     
        $createCategory = new CreateNewCategory("TestCase" , null , null );
        $entity = new Category();
        $entity->handle($createCategory);
        
        $category = $this->categoryRepository->Merge($entity);
        assertNotNull($entity->getId());
    }

    public function testGetByIdReturnsNull() : void 
    {
        $category = $this->categoryRepository->getById(1);
        
        assertNotNull($category);
    }
    

}
