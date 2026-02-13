<?php

namespace App\Services\Observer;

class EmailObserver implements ObserverInterface
{
    public function handle(string $event, array $data = []): string
    {
        $recipient = $data['email'] ?? 'unknown';

        return "[EmailObserver] Sending email to {$recipient} for event '{$event}'";
    }
}
