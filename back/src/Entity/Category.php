<?php

namespace App\Entity;

use App\Domain\Books\Events\CreateNewCategory;
use App\Domain\DomainEvent;
use App\Domain\DomainEventSubscriber;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category extends Entity implements DomainEventSubscriber
{
    public function __construct() {
        parent::__construct();
    }

    #[ORM\Column(length: 255, nullable: false)]
    public string $name = "";

    #[ORM\Column(length: 4096, nullable: true)]
    public ?string $description = null;

    #[ORM\Column(nullable: false)]
    public bool $active = false;



    public function handle(DomainEvent $aDomainEvent) :void
    {
        $this->setEntityTime();
        $this->when($aDomainEvent);
    }
    protected function setEntityTime() : void
    {
        if($this->created_at == null )
            $this->created_at = new \DateTime();
        else
            $this->updated_at = new \DateTime();
    }

    
    protected function when(DomainEvent $e) :void
    {
        switch($e::class)
        {
            case CreateNewCategory::class : $this->handleCreateNewCategory($e);break;
        };
    }
    private function handleCreateNewCategory(CreateNewCategory $e) :void
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
        $allowedEvents = array(CreateNewCategory::class);

        return true;
    }
}
