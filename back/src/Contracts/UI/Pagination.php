<?php 

namespace App\Contracts\UI;
class Pagination
{
    
    public function __construct( 
        public int $maxResults,
        public int $page 
        )
    {
        
    }
    private function ensureIsValid(int $page)
    {
        if ($page < 1) 
            throw new \InvalidArgumentException("page must start from 1");
        

    }
    public function getOffSet(): int
    {
        return $this->maxResults * $this->page;
    }
    public function getMaxResults(): int
    {
        return $this->maxResults;
    }
}