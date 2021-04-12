<?php

namespace App\Repository;

<<<<<<< HEAD:src/Repository/MediaAdherentsRepository.php
use App\Entity\MediaAdherents;
=======
use App\Entity\MediaAdherentss;
>>>>>>> 0c2a4d36e73bde1f265f56827b04f235c094ce3a:src/Repository/MediaAdherentsRepository.php
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MediaAdherents|null find($id, $lockMode = null, $lockVersion = null)
 * @method MediaAdherents|null findOneBy(array $criteria, array $orderBy = null)
 * @method MediaAdherents[]    findAll()
 * @method MediaAdherents[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MediaAdherentsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MediaAdherents::class);
    }

    // /**
    //  * @return MediaAdherents[] Returns an array of MediaAdherents objects
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
    public function findOneBySomeField($value): ?MediaAdherents
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
