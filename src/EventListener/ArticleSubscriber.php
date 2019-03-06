<?php

namespace App\EventListener;

use App\Event\ArticleCreationEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ArticleSubscriber implements EventSubscriberInterface
{
    public function __construct()
    {
    }

    public static function getSubscribedEvents()
    {
        return [
            ArticleCreationEvent::EVENT_NAME => 'onCreation',
        ];
    }

    public function onCreation(ArticleCreationEvent $event)
    {
        // TODO need created a newsletter for use it
    }
}
