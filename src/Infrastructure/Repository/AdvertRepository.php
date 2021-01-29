<?php


namespace App\Infrastructure\Repository;


use App\Domain\Advert\Contracts\AdvertCriteriaInterface;
use App\Domain\Advert\Contracts\AdvertEntityInterface;
use App\Domain\Advert\Contracts\AdvertRepositoryInterface;

use App\Infrastructure\Entity\Advert;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

class AdvertRepository extends ServiceEntityRepository implements AdvertRepositoryInterface
{

    protected $lastCount;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Advert::class);
    }


    /**
     * @param int $id
     * @return AdvertEntityInterface|null
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function findById(int $id): ?AdvertEntityInterface
    {
        return  $this->_em->find(Advert::class,1);
    }

    /**
     * @param AdvertCriteriaInterface $criteria
     * @return \ArrayIterator
     */
    public function findByCriteria(AdvertCriteriaInterface $criteria): \ArrayIterator
    {
        $paginator = $this->modifyCriteria($criteria);

        return $paginator->getIterator();
    }

    /**
     * @param AdvertCriteriaInterface $criteria
     * @return Paginator
     */
    protected function modifyCriteria(AdvertCriteriaInterface $criteria): Paginator
    {
        $currentPage = max(1, $criteria->getPage());
        $firstResult = ($currentPage - 1) * $criteria->getLimit();

        return new Paginator($this->createQueryBuilder('a')
            ->setMaxResults($criteria->getLimit())
            ->setFirstResult($firstResult)
            ->getQuery());

    }

    /**
     * @param AdvertCriteriaInterface $criteria
     * @return int
     */
    public function getCount(AdvertCriteriaInterface $criteria): int
    {
        $paginator = $this->modifyCriteria($criteria);

        return $paginator->count();
    }

}