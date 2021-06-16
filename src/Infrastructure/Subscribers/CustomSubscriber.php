<?php


namespace App\Infrastructure\Subscribers;


use App\Infrastructure\Events\CustomEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class CustomSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            CustomEvent::NAME => 'myEvent'
        ];
    }

    public function myEvent($args){
        dump('event from CustomSubscriber');
    }

}