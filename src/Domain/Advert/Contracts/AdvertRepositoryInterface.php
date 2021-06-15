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
     * @return \ArrayIterator
     */
    public function findByCriteria(AdvertCriteriaInterface $criteria): \ArrayIterator;

    /**
     * @param AdvertCriteriaInterface $criteria
     * @return int
     */
    public function getCount(AdvertCriteriaInterface $criteria): int;

    /**
     * @param AdvertEntityInterface $advertEntity
     */
    public function save(AdvertEntityInterface $advertEntity): void;
}