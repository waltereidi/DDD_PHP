<?php 

namespace App\Contracts\UI;

class Pagination
{
    /**
     * Refers to amount of rows returned
     * @var int
     */
    public int $maxResults; 
    /**
     * Refers to page location starting from 1.
     * @var int
     */
    public int $page;

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