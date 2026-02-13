<?php

namespace App\Services\Observer;

class SlackObserver implements ObserverInterface
{
    public function handle(string $event, array $data = []): string
    {
        $channel = $data['channel'] ?? '#general';

        return "[SlackObserver] Posting to {$channel} for event '{$event}'";
    }
}
