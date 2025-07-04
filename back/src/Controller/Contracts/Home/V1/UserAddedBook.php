<?php 


namespace App\Controller\Contracts\Home\V1;

class UserAddedBook
{
    public function __construct(
        public array $categories,
        public string $id, 
        public string $title , 
        public string $description, 
        public string $isbn , 
        public bool $reading_now , 
        public string $commentary 
    ){
        $categories = array_map( fn($m):UserAddedCategory
            => UserAddedCategory::instance((object)$m)
            ,$categories  );

    }

}
