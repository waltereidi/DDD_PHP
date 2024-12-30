<?php
// tests/Repository/ProductRepositoryTest.php
namespace App\Tests\Repository;

use App\Entity\Category;
use App\Kernel;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
class CategoryRepositoryTest extends KernelTestCase
{
    private ?EntityManager $entityManager;

    protected function setUp(): void
    {
        
        $kernel =KernelTestCase::bootKernel();
        
        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function testSearchByName(): void
    {
        $product = $this->entityManager
            ->getRepository(Category::class)
            ->findOneBy(['name' => 'Priceless widget'])
        ;

        $this->assertSame(14.50, $product->getPrice());
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // doing this is recommended to avoid memory leaks
        $this->entityManager->close();
        $this->entityManager = null;
    }
}