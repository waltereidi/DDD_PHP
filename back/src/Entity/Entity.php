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

    public object $_events = [];
    
    public function __construct() {
    }

}



?>
