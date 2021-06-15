<?php


namespace App\Infrastructure\Subscribers;


use App\Domain\Advert\Contracts\AdvertEntityInterface;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;

/**
 * Дделаем подписчика для событие доктрины
 * Class AdvertSubscriber
 * @package App\Infrastructure\Subscribers
 */
class AdvertSubscriber implements EventSubscriber
{
    private $indexUpdateProducer;

    public function getSubscribedEvents()
    {
        return [
            Events::postPersist
        ];
    }

    public function postPersist(LifecycleEventArgs $args){

        $entity = $args->getEntity();

        //@todo тут мы поймали стандартное событие доктрины и что то сделали с сущностью
        if($entity instanceof AdvertEntityInterface){
            //dd($entity);
        }

    }

}