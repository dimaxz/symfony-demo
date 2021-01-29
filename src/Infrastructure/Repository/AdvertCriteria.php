<?php


namespace App\Infrastructure\Repository;


use App\Domain\Advert\Contracts\AdvertCriteriaInterface;

class AdvertCriteria implements AdvertCriteriaInterface
{

    /**
     * @var
     */
    protected $page = 0;

    /**
     * @var int
     */
    protected $limit = 100;

    /**
     * @return mixed
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @param mixed $page
     * @return AdvertCriteria
     */
    public function setPage(int $page): AdvertCriteria
    {
        $this->page = $page;
        return $this;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     * @return AdvertCriteria
     */
    public function setLimit(int $limit): AdvertCriteria
    {
        $this->limit = $limit;
        return $this;
    }


    public static function create(): self
    {
        return new self;
    }

}