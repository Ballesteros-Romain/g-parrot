<?php

namespace App\Repository;

use App\Entity\SousServices;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SousServices>
 *
 * @method SousServices|null find($id, $lockMode = null, $lockVersion = null)
 * @method SousServices|null findOneBy(array $criteria, array $orderBy = null)
 * @method SousServices[]    findAll()
 * @method SousServices[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SousServicesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SousServices::class);
    }

//    /**
//     * @return SousServices[] Returns an array of SousServices objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SousServices
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
