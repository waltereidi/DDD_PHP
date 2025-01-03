<?php

namespace App\Entity;

use App\Domain\Books\Events\CreateNewCategory;
use App\Domain\DomainEvent;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category extends Entity
{
    public function __construct() {
        parent::__construct();
    }

    #[ORM\Column(length: 255, nullable: false)]
    public ?string $name = null;

    #[ORM\Column(length: 4096, nullable: true)]
    public ?string $description = null;

    #[ORM\Column(nullable: false)]
    public ?bool $active = null;

    #[\Override]
    public function handle(DomainEvent $e) :void
    {
        match($e::class)
        {
            CreateNewCategory::class => $this->handleCreateNewCategory($e), 
        };
    }
    private function handleCreateNewCategory(CreateNewCategory $e) :void
    {
        $this->name = $e->getName();
        $this->description = $e->getDescription();
        $this->active = $e->getActive();
    }
}
