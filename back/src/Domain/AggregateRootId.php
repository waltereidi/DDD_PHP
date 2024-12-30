<?php 
namespace  App\Domain;
use Ramsey\Uuid\Uuid;
class AggregateRootId {
    protected string $id;

    public static function create(): AggregateRootId
    {
        return new static(Uuid::uuid4()->toString());
    }

    public function id(): string
    {
        return $this->id;
    }

    public function __toString():string            
    {
        return $this->id;
    }
}