<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category extends Entity
{

    public function __construct() {
        parent::__construct();
    }

    #[ORM\Column(length: 255)]
    public ?string $name = null;

    #[ORM\Column(length: 4096, nullable: true)]
    public ?string $description = null;

    #[ORM\Column]
    public ?bool $active = null;

}
