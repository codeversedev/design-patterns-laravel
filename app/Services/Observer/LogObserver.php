<?php

namespace App\Services\Observer;

class LogObserver implements ObserverInterface
{
    public function handle(string $event, array $data = []): string
    {
        $payload = json_encode($data);

        return "[LogObserver] Logging event '{$event}' with data: {$payload}";
    }
}
