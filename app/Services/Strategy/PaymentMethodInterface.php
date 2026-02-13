<?php

namespace App\Services\Strategy;

interface PaymentMethodInterface
{
    public function pay(float $amount): string;

    public function getName(): string;
}
