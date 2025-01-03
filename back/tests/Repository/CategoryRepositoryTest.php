<?php

namespace App\Tests\Repository;
use App\Repository\CategoryRepository;
use Doctrine\Persistence\ManagerRegistry;
use PHPUnit\Util\Json;
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
    //delete it later
     public function testSemantics() : void 
    {
        $list = [];
        $test = new Json('');
        array_push($list , $test);
        
        $result = array_filter(array: $list, callback: fn($x): bool=> $x::class == Json::class);
        
        $this->assertTrue($result);
    }
    
    public function testGetByIdReturnsNull() : void 
    {
        $category = $this->categoryRepository->getById(1);
        
        assertNotNull($category);
    }
    

}
