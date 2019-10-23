<?php

namespace App\Repository;

use App\Entity\DepartmentCompany;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method DepartmentCompany|null find($id, $lockMode = null, $lockVersion = null)
 * @method DepartmentCompany|null findOneBy(array $criteria, array $orderBy = null)
 * @method DepartmentCompany[]    findAll()
 * @method DepartmentCompany[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DepartmentCompanyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DepartmentCompany::class);
    }

    // /**
    //  * @return DepartmentCompany[] Returns an array of DepartmentCompany objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DepartmentCompany
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
