<?php

namespace App\Repository;

use App\Entity\PanelEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PanelEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method PanelEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method PanelEntity[]    findAll()
 * @method PanelEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PanelEntityRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PanelEntity::class);
    }

    // /**
    //  * @return PanelEntity[] Returns an array of PanelEntity objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PanelEntity
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
