<?php

namespace App\Repository;

use App\Entity\Cars;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cars>
 *
 * @method Cars|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cars|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cars[]    findAll()
 * @method Cars[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cars::class);
    }

    
    // src/Repository/CarsRepository.php

public function findByFilters($marque = null, $kilometre = null, $annee = null, $price = null)
{
    $qb = $this->createQueryBuilder('c');
    $query = $qb->getQuery();
    // if ($marque !== null) {
    //     $qb->andWhere('c.marque = :marque')
    //        ->setParameter('marque', $marque);
    // }

    // if ($kilometre !== null) {
    //     $qb->andWhere('c.kilometre <= :kilometre')
    //        ->setParameter('kilometre', $kilometre);
    // }

    // if ($annee !== null) {
    //     $qb->andWhere('c.annee = :annee')
    //        ->setParameter('annee', $annee);
    // }

    // if ($price !== null) {
    //     $qb->andWhere('c.price <= :price')
    //        ->setParameter('price', $price);
    // }

    // return $qb->getQuery()->getResult();
    $qb->select('c')
    ->from('App:Cars','c')
    ->orderBy('c.marque', 'ASC');
    $qb = $query->getResult();
    return $qb;
}


    
//    /**
//     * @return Cars[] Returns an array of Cars objects
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

//    public function findOneBySomeField($value): ?Cars
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}