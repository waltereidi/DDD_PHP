<?php

namespace App\Domain;

interface Subscriber
{
    /**
     * Is a Event Handler SSOT
     * Select a event to be executed in this entity
     * @param \App\Domain\DomainEvent $aDomainEvent
     * @return void
     */
    public function handle(DomainEvent $aDomainEvent) :void;

    /**
     * Subscribe to ensures that an event can be executed ,
     * the rules for this method should increase along with the business rules
     * @param DomainEvent $aDomainEvent
     * @return bool
     */
    public function isSubscribedTo(DomainEvent $aDomainEvent) : bool;


}