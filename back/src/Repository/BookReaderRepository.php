<?php

namespace App\Repository;

use App\Entity\BookReader;
use App\Tests\Repository\ModelProjections;
use Doctrine\Persistence\ManagerRegistry;


class BookReaderRepository  extends ModelProjections
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BookReader::class);
    }

}
