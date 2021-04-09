<?php

namespace App\Repository;

use App\Entity\MediaContributor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MediaContributor|null find($id, $lockMode = null, $lockVersion = null)
 * @method MediaContributor|null findOneBy(array $criteria, array $orderBy = null)
 * @method MediaContributor[]    findAll()
 * @method MediaContributor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MediaContributorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MediaContributor::class);
    }

    // /**
    //  * @return MediaContributor[] Returns an array of MediaContributor objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MediaContributor
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
