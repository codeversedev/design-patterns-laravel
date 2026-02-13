<?php

namespace App\Services\Observer;

class EventNotification
{
    /** @var array<string, ObserverInterface[]> */
    private array $listeners = [];

    public function subscribe(string $event, ObserverInterface $observer): self
    {
        $this->listeners[$event][] = $observer;

        return $this;
    }

    public function unsubscribe(string $event, ObserverInterface $observer): self
    {
        if (isset($this->listeners[$event])) {
            $this->listeners[$event] = array_values(
                array_filter($this->listeners[$event], fn (ObserverInterface $o) => $o !== $observer)
            );
        }

        return $this;
    }

    /**
     * Notify all observers subscribed to the given event.
     *
     * @return string[] Results from each observer
     */
    public function notify(string $event, array $data = []): array
    {
        $results = [];

        foreach ($this->listeners[$event] ?? [] as $observer) {
            $results[] = $observer->handle($event, $data);
        }

        return $results;
    }
}
