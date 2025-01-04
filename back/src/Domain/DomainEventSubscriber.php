<?php

namespace App\Domain;

abstract class DomainEventSubscriber
{
     /**
     * Is a Event Handler SSOT
     * Select a event to be executed in this entity
     * @param \App\Domain\DomainEvent $aDomainEvent
     * @return void
     */
    public abstract function handle(DomainEvent $aDomainEvent) :void;

    /**
     * TODO: Implement this method 
     * Is this event already subscribed 
     * @param DomainEvent $aDomainEvent
     * @return bool
     */
    public function isSubscribedTo($aDomainEvent) : bool 
    {
        //TODO: Implement this method
        return false; 
    }
    /**
     * Override this method to select between events actions
     * @param \App\Domain\DomainEvent $aDomainEvent
     * @return void
     */
    protected abstract function when(DomainEvent $aDomainEvent):void;

}