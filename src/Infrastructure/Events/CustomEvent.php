<?php


namespace App\Infrastructure\Events;


use App\Domain\Advert\Contracts\AdvertEntityInterface;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Class CustomEvent
 * @package App\Infrastructure\Subscribers
 */
class CustomEvent extends Event
{
    public const NAME = 'custom.event';

    private $advertEntity;

    public function __construct(AdvertEntityInterface $advertEntity)
    {
        $this->advertEntity = $advertEntity;
    }

    /**
     * @return AdvertEntityInterface
     */
    public function getAdvertEntity(): AdvertEntityInterface
    {
        return $this->advertEntity;
    }

}