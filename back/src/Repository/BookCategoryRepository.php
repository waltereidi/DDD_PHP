<?php

namespace App\Repository;

use App\Entity\BookCategory;
use App\Tests\Repository\ModelProjections;
use Doctrine\Persistence\ManagerRegistry;


class BookCategoryRepository  extends ModelProjections
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BookCategory::class);
    }


}
