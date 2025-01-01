<?php 


namespace App\Tests\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

abstract class ModelProjections extends ServiceEntityRepository
{
    protected function __construct(ManagerRegistry $registry ,string $entity )
    {
        parent::__construct($registry, $entity);
    }

    public function getById(int $id)
    {
        return $this->createQueryBuilder('c')
            ->where('c.id = :val')
            ->setParameter('val' , $id )
            ->getQuery()
            ->getResult();
    }
    public function updateById(object $entity)  
    {     
        $this->
    }
}
