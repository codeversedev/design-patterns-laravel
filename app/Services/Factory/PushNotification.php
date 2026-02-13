<?php

namespace App\Services\Factory;

class PushNotification implements NotificationInterface
{
    public function send(string $recipient, string $message): string
    {
        return "Push notification sent to {$recipient}: {$message}";
    }

    public function getChannel(): string
    {
        return 'push';
    }
}
