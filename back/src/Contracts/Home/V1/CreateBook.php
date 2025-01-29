<?php 

namespace App\Contracts\Home\V1;

use App\Entity\Book;
use App\Entity\BookReader;
use App\Entity\UserBookReadingNow;

class CreateBook
{

    public function __construct(
        public array $categories,
        public UserBookReadingNow $userBookReadingNow
    ){

    }

}
