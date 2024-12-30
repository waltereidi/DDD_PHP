<?php 
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
class Test{

}
abstract class Entity{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public ?int $id = null;
  /** @var object[] */
    public array $_events = [];
    
    public function __construct() {
    }

}



?>
