<?php

namespace App\Repository;

use App\Entity\ScoffTest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ScoffTest|null find($id, $lockMode = null, $lockVersion = null)
 * @method ScoffTest|null findOneBy(array $criteria, array $orderBy = null)
 * @method ScoffTest[]    findAll()
 * @method ScoffTest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScoffTestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ScoffTest::class);
    }

    // /**
    //  * @return ScoffTest[] Returns an array of ScoffTest objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ScoffTest
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
