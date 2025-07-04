<?php
namespace App\Controller\Contracts\Home\V1;

use Ramsey\Uuid\Lazy\LazyUuidFromString;
use Ramsey\Uuid\Uuid;
class UserAddedCategory
{
    //public LazyUuidFromString $uuid; 
    public function __construct(
        public ?string $id,
        public string $name , 
        public ?string $description 
    ) 
    {
        // $this->uuid = $this->id == null 
        //     ?  null 
        //     : Uuid::fromString($this->id);
    }
        
    public static function instance(object $c) :UserAddedCategory
    {
        return new UserAddedCategory($c->id , $c->name , $c->description);
    }
}