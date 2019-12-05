<?php

namespace App\Repository;

use App\Entity\Cours;
use App\Entity\Formateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method Cours|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cours|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cours[]    findAll()
 * @method Cours[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cours::class);
    }

    /**
    * @return Cours[] Returns an array of Cours objects
    */

    public function findAllCours()
    {
        return $this->createQueryBuilder('c')
            ->join ('c.formateur', 'f')
            ->select('c.libelle', 'f.prenom', 'c.date_debut', 'c.date_fin')
            ->orderBy('c.date_debut', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    public function findAllCoursByFormateur($formateur_id)
    {
        return $this->createQueryBuilder('c')
            ->setParameter("formateur_id", $formateur_id)
            ->join ('c.formateur', 'f')
            ->andWhere('f.id=:formateur_id')
            ->select('c.libelle', 'f.prenom', 'c.date_debut', 'c.date_fin')
            ->orderBy('c.date_debut', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
    
    public function findAllByLibelle($cours_libelle)
    {
        return $this->createQueryBuilder('c')
        ->setParameter("cours_libelle", $cours_libelle)
            ->join ('c.formateur', 'f')
            ->andWhere('c.libelle=:cours_libelle')
            ->select('c.libelle', 'f.prenom', 'c.date_debut', 'c.date_fin')
            ->orderBy('c.date_debut', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }


    /*  public function addCours(
        string $libelle,
        \DateTimeInterface $date_debut,
        \DateTimeInterface $date_fin
    ): Cours {
        $em = $this->getEntityManager();

        $coursItem = new Cours();
        $coursItem
            ->setLibelle($libelle)
            ->setDateDebut($date_debut)
            ->setDateFin(($date_fin);

        $em->persist($coursItem);
        $em->flush();

        return $coursItem;
    } */

    
    /*
    public function findOneBySomeField($value): ?Cours
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
