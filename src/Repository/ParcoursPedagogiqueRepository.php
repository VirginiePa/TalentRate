<?php

namespace App\Repository;

use App\Entity\ParcoursPedagogique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ParcoursPedagogique|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParcoursPedagogique|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParcoursPedagogique[]    findAll()
 * @method ParcoursPedagogique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParcoursPedagogiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ParcoursPedagogique::class);
    }

    // /**
    //  * @return ParcoursPedagogique[] Returns an array of ParcoursPedagogique objects
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
    public function findOneBySomeField($value): ?ParcoursPedagogique
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
