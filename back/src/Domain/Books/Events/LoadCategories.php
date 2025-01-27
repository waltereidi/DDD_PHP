<?php 
namespace App\Domain\Books\Events;

use App\Domain\DomainEvent;
use App\Entity\Category;

class LoadCategories  implements DomainEvent
{
    /**
     * @var App\Entity\Category;
     */
    private array $identifiedCategories = [];
    private array $unidentifiedCategories = [];
    private \DateTimeImmutable $occurredOn; 
    public function __construct(array $categories )
    {
        $this->occurredOn = new \DateTimeImmutable(); 

        $this->ensureCategoriesClass($categories);
        
        $this->identifiedCategories = array_filter($categories , fn($x) => $x->id != null);
        $this->identifiedCategories = array_filter($categories , fn($x) => $x->id == null);
    }
    public function occurredOn(): \DateTimeImmutable{
        return $this->occurredOn;
    }

    public function getCategoriesWithId(): array     
    {
        return $this->identifiedCategories;
    }

    /**
     * Summary of replaceCategories
     * Categories requested from repository to be replaced
     * @param array $categories
     * @return void
     */
    public function replaceCategories(array $categories ):void
    {
        $this->identifiedCategories = $categories;
    }
    private function ensureCategoriesClass(array $categories):void 
    {
        foreach($categories as $c ){
            if($c::class !== Category::class)
                throw new InvalidArgumentException("Array must be of type category");
        }
    }
    
}
