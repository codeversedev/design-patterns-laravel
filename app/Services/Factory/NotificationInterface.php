<?php

namespace App\Services\Factory;

interface NotificationInterface
{
    public function send(string $recipient, string $message): string;

    public function getChannel(): string;
}
