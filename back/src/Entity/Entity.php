<?php 

namespace App\Entity;
use App\Domain\DomainEvent;
use App\Domain\DomainEventSubscriber;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

abstract class Entity 
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public ?int $id = null;
  
    #[ORM\Column(type: Types::DATETIME_MUTABLE, options: ["default" => "CURRENT_TIMESTAMP"])]
    public ?\DateTimeInterface $created_at = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    public ?\DateTimeInterface $updated_at = null;

    public function __construct() 
    {
    }




}
