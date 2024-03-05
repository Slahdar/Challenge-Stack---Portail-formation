<?php

namespace App\Repository;

use App\Entity\Organisme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Organisme>
 *
 * @method Organisme|null find($id, $lockMode = null, $lockVersion = null)
 * @method Organisme|null findOneBy(array $criteria, array $orderBy = null)
 * @method Organisme[]    findAll()
 * @method Organisme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrganismeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Organisme::class);
    }

    //    /**
    //     * @return Organisme[] Returns an array of Organisme objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('o')
    //            ->andWhere('o.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('o.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Organisme
    //    {
    //        return $this->createQueryBuilder('o')
    //            ->andWhere('o.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
