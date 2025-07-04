<?php 


namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ModelProjections extends ServiceEntityRepository
{
    protected function __construct(ManagerRegistry $registry ,string $entity )
    {
        parent::__construct($registry, $entity);
    }
    public function Merge(object $entity)  : object
    {     
        $entityManager = $this->getEntityManager();

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($entity);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return $entity;
    }
    
}
