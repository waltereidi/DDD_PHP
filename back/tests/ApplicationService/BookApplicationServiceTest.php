<?php 

use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
class BookApplicationServiceTest extends KernelTestCase
{
    private ?ManagerRegistry $managerRegistry;
    protected function setUp(): void
    {
        $kernel = self::bootKernel();

        $this->managerRegistry = $kernel
            ->getContainer()
            ->get('doctrine');

    }
    private function setTestUserSession()
    {

    }


}