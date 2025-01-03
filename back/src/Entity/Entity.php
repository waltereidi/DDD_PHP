<?php 

namespace App\Entity;
use App\Domain\DomainEvent;
use App\Domain\DomainEventSubscriber;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

abstract class Entity implements DomainEventSubscriber
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public ?int $id = null;
  
    #[ORM\Column(type: Types::DATETIME_MUTABLE, options: ["default" => "CURRENT_TIMESTAMP"])]
    private ?\DateTimeInterface $created_at = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updated_at = null;
    
    /** @var DomainEvent[] */
    public array $_events = [];
    
    public function __construct() 
    {
    }
    
    public function isSubscribedTo($aDomainEvent) : bool 
    {
        return false; 
    }
    /**
     * Is a Event Handler SSOT
     * Select a event to be executed in this entity
     * @param \App\Domain\DomainEvent $aDomainEvent
     * @return void
     */
    public function handle(DomainEvent $aDomainEvent) :void
    {
    }


}
