<?php

namespace App\Repository;

use App\Entity\Category;
use App\Tests\Repository\ModelProjections;
use Doctrine\Persistence\ManagerRegistry;

class CategoryRepository extends ModelProjections
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Category::class);
    }

    public function findByName(array $name)
    {
        $this->repository
            ->categoryRepository
            ->findBy(array('name' => $name));
        
    }

}
