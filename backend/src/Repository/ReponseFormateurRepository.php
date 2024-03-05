<?php

namespace App\Repository;

use App\Entity\ReponseFormateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ReponseFormateur>
 *
 * @method ReponseFormateur|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReponseFormateur|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReponseFormateur[]    findAll()
 * @method ReponseFormateur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReponseFormateurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReponseFormateur::class);
    }

    //    /**
    //     * @return ReponseFormateur[] Returns an array of ReponseFormateur objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('r.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?ReponseFormateur
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
