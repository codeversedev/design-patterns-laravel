<?php

namespace App\Services\Factory;

class NotificationFactory
{
    public static function create(string $channel): NotificationInterface
    {
        return match ($channel) {
            'email' => new EmailNotification(),
            'sms'   => new SmsNotification(),
            'push'  => new PushNotification(),
            default => throw new \InvalidArgumentException("Unsupported notification channel: {$channel}"),
        };
    }
}
