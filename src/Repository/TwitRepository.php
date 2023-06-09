<?php

namespace App\Repository;

use App\Entity\Twit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Twit>
 *
 * @method Twit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Twit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Twit[]    findAll()
 * @method Twit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TwitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Twit::class);
    }

    public function save(Twit $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Twit $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
