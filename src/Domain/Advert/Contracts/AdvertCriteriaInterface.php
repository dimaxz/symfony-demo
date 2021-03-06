<?php


namespace App\Domain\Advert\Contracts;


interface AdvertCriteriaInterface
{

    /**
     * @param int $id
     * @return mixed
     */
    public function setLimit(int $id);

    /**
     * @param int $page
     * @return mixed
     */
    public function setPage(int $page);

    /**
     * @return int
     */
    public function getPage():int;

    /**
     * @return int
     */
    public function getLimit():int;

    /**
     * @return string|null
     */
    public function getSortById():?string;

    /**
     * @param string|null $sort
     * @return mixed
     */
    public function setSortById(?string $sort);
}