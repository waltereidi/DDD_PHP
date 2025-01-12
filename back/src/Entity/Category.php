<?php

namespace App\Entity;

use App\Domain\Books\Events\CreateCategory;
use App\Domain\DomainEvent;
use App\Domain\DomainEventSubscriber;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category extends Entity implements DomainEventSubscriber
{
    public function __construct() {
        parent::__construct();
    }

    private string $name = "";
    private ?string $description = null;
    private bool $active = false;

    public function getName() : string
    {
        return $this->name;
    }
   
    public function getDescription() : ?string
    {
        return $this->description;
    }

    public function getActive() : bool
    {
        return $this->active;
    }

    public function handle(DomainEvent $aDomainEvent) :void
    {
        $this->setEntityTime();
        $this->when($aDomainEvent);
        $this->setNewGuid();
    }

    protected function when(DomainEvent $e) :void
    {
        switch($e::class)
        {
            case CreateCategory::class : $this->handleCreateNewCategory($e);break;
        };
    }
    private function handleCreateNewCategory(CreateCategory $e) :void
    {
        
        $this->name = $e->getName();
        $this->description = $e->getDescription();
        $this->active = $e->getActive();
    }
    /**
     * Subscribe to ensures that an event can be executed ,
     * the rules for this method should increase along with the business rules
     * @param \App\Domain\DomainEvent $aDomainEvent
     * @return bool
     */
    public function isSubscribedTo(DomainEvent $aDomainEvent) : bool
    {
        $allowedEvents = array(CreateCategory::class);

        return true;
    }
}
