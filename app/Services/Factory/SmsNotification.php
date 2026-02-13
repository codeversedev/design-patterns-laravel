<?php

namespace App\Services\Factory;

class SmsNotification implements NotificationInterface
{
    public function send(string $recipient, string $message): string
    {
        return "SMS sent to {$recipient}: {$message}";
    }

    public function getChannel(): string
    {
        return 'sms';
    }
}
