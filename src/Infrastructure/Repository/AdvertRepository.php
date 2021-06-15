<?php

namespace App\Infrastructure\Repository;

use App\Domain\Advert\Contracts\AdvertCriteriaInterface;
use App\Domain\Advert\Contracts\AdvertEntityInterface;
use App\Domain\Advert\Contracts\AdvertRepositoryInterface;

use App\Infrastructure\Entity\Advert;
use App\Infrastructure\Events\CustomEvent;
use App\Infrastructure\Subscribers\CustomSubscriber;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\EventDispatcher\EventDispatcher;

class AdvertRepository extends ServiceEntityRepository implements AdvertRepositoryInterface
{

    protected $lastCount;
    private $eventDispatcher;

    /**
     * AdvertRepository constructor.
     * @param ManagerRegistry $registry
     * @param EventDispatcher $eventDispatcher
     */
    public function __construct(ManagerRegistry $registry, EventDispatcher $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
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
        return $this->_em->find(Advert::class, 1);
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
            ->orderBy('a.id', $criteria->getSortById())
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

    /**
     * @param AdvertEntityInterface $advertEntity
     * @throws \Doctrine\ORM\ORMException
     */
    public function save(AdvertEntityInterface $advertEntity): void
    {

        //$this->_em->beginTransaction();
        $this->_em->persist($advertEntity);
        $this->_em->flush();

        //$this->eventDispatcher->addSubscriber(new CustomSubscriber()); //регистрируем подписчика на уровне приложения в services.yaml
        $this->eventDispatcher->dispatch(new CustomEvent($advertEntity), CustomEvent::NAME);
    }
}