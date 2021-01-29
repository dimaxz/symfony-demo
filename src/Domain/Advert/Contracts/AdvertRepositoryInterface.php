<?php


namespace App\Domain\Advert\Contracts;


interface AdvertRepositoryInterface
{

    /**
     * @param int $id
     * @return AdvertEntityInterface|null
     */
    public function findById(int $id): ?AdvertEntityInterface;


    /**
     * @param AdvertCriteriaInterface $criteria
     * @return array
     */
    public function findByCriteria(AdvertCriteriaInterface $criteria): \ArrayIterator;

    /**
     * @return int
     */
    public function getCount(AdvertCriteriaInterface $criteria): int;
}