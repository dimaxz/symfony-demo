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
     * @var string|null
     */
    protected $sortById;

    /**
     * @return string|null
     */
    public function getSortById(): ?string
    {
        return $this->sortById;
    }

    /**
     * @param string|null $sortById
     * @return AdvertCriteria
     */
    public function setSortById(?string $sortById): AdvertCriteria
    {
        $this->sortById = $sortById;
        return $this;
    }



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