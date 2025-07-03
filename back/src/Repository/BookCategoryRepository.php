<?php

namespace App\Repository;

use App\Entity\BookCategory;
use  App\Repository\ModelProjections;
use Doctrine\Persistence\ManagerRegistry;


class BookCategoryRepository  extends ModelProjections
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BookCategory::class);
    }


}
