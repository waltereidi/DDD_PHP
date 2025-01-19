<?php 

namespace App\Contracts\UI;

class Pagination
{
    /**
     * Refers to amount of rows returned
     * @var int
     */
    private int $maxResults; 
    /**
     * Refers to page location starting from 1.
     * @var int
     */
    private int $page;

    public function __construct(int $page, int $maxResults)
    {
        $this->ensureIsValid($page);

        $this->maxResults = $maxResults;
        $this->page = $page - 1;
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