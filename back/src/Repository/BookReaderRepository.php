<?php

namespace App\Repository;

use App\Entity\BookReader;
use  App\Repository\ModelProjections;
use Doctrine\Persistence\ManagerRegistry;


class BookReaderRepository  extends ModelProjections
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BookReader::class);
    }

}
