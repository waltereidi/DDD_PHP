<?php 

namespace App\Entity;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Lazy\LazyUuidFromString;
abstract class Entity 
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "UuidType")]
    public ?LazyUuidFromString $id = null;
  
    #[ORM\Column(type: Types::DATETIME_MUTABLE, options: ["default" => "CURRENT_TIMESTAMP"])]
    public ?\DateTimeInterface $created_at = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    public ?\DateTimeInterface $updated_at = null;

    public function __construct() 
    {
    }
    protected function setNewGuid():void
    {
        $this->id = Uuid::uuid4();
    }
    protected function setEntityTime() : void
    {
        if($this->created_at == null )
            $this->created_at = new \DateTime();
        else
            $this->updated_at = new \DateTime();
    }



}
