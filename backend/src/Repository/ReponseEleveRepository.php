<?php

namespace App\Repository;

use App\Entity\ReponseEleve;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ReponseEleve>
 *
 * @method ReponseEleve|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReponseEleve|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReponseEleve[]    findAll()
 * @method ReponseEleve[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReponseEleveRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReponseEleve::class);
    }

    //    /**
    //     * @return ReponseEleve[] Returns an array of ReponseEleve objects
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

    //    public function findOneBySomeField($value): ?ReponseEleve
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
