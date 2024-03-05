<?php

namespace App\Repository;

use App\Entity\CalendrierCours;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CalendrierCours>
 *
 * @method CalendrierCours|null find($id, $lockMode = null, $lockVersion = null)
 * @method CalendrierCours|null findOneBy(array $criteria, array $orderBy = null)
 * @method CalendrierCours[]    findAll()
 * @method CalendrierCours[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CalendrierCoursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CalendrierCours::class);
    }

    //    /**
    //     * @return CalendrierCours[] Returns an array of CalendrierCours objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?CalendrierCours
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
