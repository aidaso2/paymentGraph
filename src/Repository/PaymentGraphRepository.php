<?php

namespace App\Repository;

use App\Entity\PaymentGraph;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PaymentGraph>
 *
 * @method PaymentGraph|null find($id, $lockMode = null, $lockVersion = null)
 * @method PaymentGraph|null findOneBy(array $criteria, array $orderBy = null)
 * @method PaymentGraph[]    findAll()
 * @method PaymentGraph[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PaymentGraphRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PaymentGraph::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(PaymentGraph $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(PaymentGraph $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return PaymentGraph[] Returns an array of PaymentGraph objects
    //  */
    public function findById($id)
    {
        return $this->createQueryBuilder('pg')
            ->andWhere('pg.id = :id')
            ->setParameter('id', $id)
            ->orderBy('pg.id', 'ASC')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return PaymentGraph[] Returns an array of PaymentGraph objects
    //  */
    public function getAll()
    {
        return $this->createQueryBuilder('pg')
            ->orderBy('pg.paymentDate', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?PaymentGraph
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
