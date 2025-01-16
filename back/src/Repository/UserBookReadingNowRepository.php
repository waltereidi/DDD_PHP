<?php

namespace App\Repository;

use App\Entity\UserBookReadingNow;
use App\Tests\Repository\ModelProjections;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends  ModelProjections
 */
class UserBookReadingNowRepository  extends ModelProjections
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserBookReadingNow::class);
    }

    //    /**
    //     * @return UserBookReadingNow[] Returns an array of UserBookReadingNow objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('u.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?UserBookReadingNow
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
