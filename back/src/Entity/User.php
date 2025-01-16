<?php

namespace App\Entity;

use App\Domain\DomainEvent;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User extends Entity
{

    private string $email;


    public function getEmail(string $email): string
    {
        return $this->email;
    }
    
    public function handle(DomainEvent $aDomainEvent) :void
    {
    }

    protected function when(DomainEvent $e) :void
    {
    }
    public function isSubscribedTo(DomainEvent $aDomainEvent) : bool
    {
        return true;
    }

}
