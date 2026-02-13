<?php

namespace App\Services\Strategy;

class CreditCardPayment implements PaymentMethodInterface
{
    public function __construct(
        private string $cardNumber,
        private string $expiryDate,
        private string $cvv,
    ) {}

    public function pay(float $amount): string
    {
        $maskedCard = str_repeat('*', strlen($this->cardNumber) - 4).substr($this->cardNumber, -4);

        return "Paid \${$amount} via Credit Card ending in {$maskedCard}.";
    }

    public function getName(): string
    {
        return 'Credit Card';
    }
}
