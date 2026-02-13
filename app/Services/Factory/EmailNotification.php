<?php

namespace App\Services\Factory;

class EmailNotification implements NotificationInterface
{
    public function send(string $recipient, string $message): string
    {
        return "Email sent to {$recipient}: {$message}";
    }

    public function getChannel(): string
    {
        return 'email';
    }
}
