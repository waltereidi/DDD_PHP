<?php 
namespace App\Domain\Books;

use Ramsey\Uuid\Lazy\LazyUuidFromString;

class BookDomainSubscribedIndex
{
    public LazyUuidFromString $uuid;
    public int $id; 
    public function __constructor(LazyUuidFromString $uuid ,int $id ):void
    {
        $this->uuid = $uuid;
        $this->id = $id;         
    }

    
}