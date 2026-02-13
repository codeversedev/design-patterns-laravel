<?php

namespace App\Services\Observer;

interface ObserverInterface
{
    public function handle(string $event, array $data = []): string;
}
