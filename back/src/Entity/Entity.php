<?php 

namespace App\Entity;
use App\Domain\DomainEvent;
use App\Domain\DomainEventSubscriber;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

abstract class Entity extends DomainEventSubscriber
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public ?int $id = null;
  
    #[ORM\Column(type: Types::DATETIME_MUTABLE, options: ["default" => "CURRENT_TIMESTAMP"])]
    private ?\DateTimeInterface $created_at = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updated_at = null;

    public function __construct() 
    {
    }

    #[\Override]
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



}
