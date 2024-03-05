<?php

namespace App\Repository;

use App\Entity\ReponseOuverteFormateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ReponseOuverteFormateur>
 *
 * @method ReponseOuverteFormateur|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReponseOuverteFormateur|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReponseOuverteFormateur[]    findAll()
 * @method ReponseOuverteFormateur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReponseOuverteFormateurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReponseOuverteFormateur::class);
    }

    //    /**
    //     * @return ReponseOuverteFormateur[] Returns an array of ReponseOuverteFormateur objects
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

    //    public function findOneBySomeField($value): ?ReponseOuverteFormateur
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
