<?php

namespace App\Domain;

//snippet aggregate-root
abstract class AggregateRoot
{
    /** @var DomainEvent[] */
    private array $recordedEvents = [];
    /**
     * Summary of id
     * @var AggregateRootId
     */
    protected AggregateRootId $id;

    public function __construct(AggregateRootId $id){
        $this->id = $id;
    }
    
    protected function recordApplyAndPublishThat(DomainEvent $event): void {
        $this->recordThat($event);
        $this->applyThat($event);
        $this->publishThat($event);
    }
    public function id() : AggregateRootId
    {
        return $this->id;
    }
    protected function recordThat(DomainEvent $event): void
    {
        $this->recordedEvents[] = $event;
    }

    protected function applyThat(DomainEvent $event): void
    {
        $className = (new \ReflectionClass($event))->getShortName();

        $modifier = 'apply' . $className;

        $this->$modifier($event);
    }

    protected function publishThat(DomainEvent $event): void
    {
        DomainEventPublisher::instance()->publish($event);
    }

    /** @return DomainEvent[] */
    public function recordedEvents(): array
    {
        return $this->recordedEvents;
    }

    public function clearEvents(): void
    {
        $this->recordedEvents = [];
    }
}
//end-snippet