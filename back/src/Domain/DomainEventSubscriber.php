<?php

namespace App\Domain;

interface DomainEventSubscriber
{
    /**
     * SSOT for events to be applied
     * @param DomainEvent $aDomainEvent
     */
    public function handle(DomainEvent $aDomainEvent) :void;

    /**
     * Is this event already subscribed 
     * @param DomainEvent $aDomainEvent
     * @return bool
     */
    public function isSubscribedTo($aDomainEvent) : bool ;

}