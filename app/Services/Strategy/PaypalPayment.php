<?php

namespace App\Services\Strategy;

class PaypalPayment implements PaymentMethodInterface
{
    public function __construct(
        private string $email,
    ) {}

    public function pay(float $amount): string
    {
        return "Paid \${$amount} via PayPal ({$this->email}).";
    }

    public function getName(): string
    {
        return 'PayPal';
    }
}
