<?php

namespace App\Repository;

use App\Entity\PointInteret;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PointInteret>
 *
 * @method PointInteret|null find($id, $lockMode = null, $lockVersion = null)
 * @method PointInteret|null findOneBy(array $criteria, array $orderBy = null)
 * @method PointInteret[]    findAll()
 * @method PointInteret[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PointInteretRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PointInteret::class);
    }

    public function getPointsInterets(String $critère = null, String $ville = '*') {
        if ($ville == '*') {
            return $this->createQueryBuilder('m')
                ->select('m')
                ->join('m.type', 'c')
                ->andWhere('c.critere = :critere')
                ->setParameter('critere', $critère)
                ->getQuery()
                ->getResult();
        } else {
            return $this->createQueryBuilder('m')
                ->select('m')
                ->join('m.type', 'c')
                ->where('m.ville = :ville')
                ->andWhere('c.critere = :critere')
                ->setParameter('ville', $ville)
                ->setParameter('critere', $critère)
                ->getQuery()
                ->getResult();
        }

    }

    public function save(PointInteret $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(PointInteret $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return PointInteret[] Returns an array of PointInteret objects
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

//    public function findOneBySomeField($value): ?PointInteret
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
