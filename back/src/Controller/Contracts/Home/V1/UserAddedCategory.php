<?php
namespace App\Controller\Contracts\Home\V1;
class UserAddedCategory
{
    public function __construct(
        public ?string $id,
        public string $name , 
        public ?string $description 
    ) {
        
    }
        
    public static function instance(object $c) :UserAddedCategory
    {
        return new UserAddedCategory($c->id , $c->name , $c->description);
    }
}