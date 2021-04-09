<?php

namespace App\Repository;

use App\Entity\MediaAdherent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MediaAdherent|null find($id, $lockMode = null, $lockVersion = null)
 * @method MediaAdherent|null findOneBy(array $criteria, array $orderBy = null)
 * @method MediaAdherent[]    findAll()
 * @method MediaAdherent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MediaAdherentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MediaAdherent::class);
    }

    // /**
    //  * @return MediaAdherent[] Returns an array of MediaAdherent objects
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
    public function findOneBySomeField($value): ?MediaAdherent
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
