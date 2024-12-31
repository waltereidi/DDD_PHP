<?php

namespace App\Tests\Repository;
use Doctrine\ORM\EntityManager;
use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use function PHPUnit\Framework\assertNotNull;

class CategoryRepositoryTest extends KernelTestCase
{
   
    private ?EntityManager $entityManager;

    protected function setUp(): void
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager(); 
    }

    public function testGetById() : void 
    {
        $e = $this->entityManager
            ->getRepository(Category::class)
            ->findOneBy(['id' => 1]);

        assertNotNull("id");
    }
}
