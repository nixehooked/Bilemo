<?php

namespace App\Repository;

use App\Entity\Phones;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Phones|null find($id, $lockMode = null, $lockVersion = null)
 * @method Phones|null findOneBy(array $criteria, array $orderBy = null)
 * @method Phones[]    findAll()
 * @method Phones[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PhonesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Phones::class);
    }

    // /**
    //  * @return Phones[] Returns an array of Phones objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Phones
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
