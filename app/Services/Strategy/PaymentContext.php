<?php

namespace App\Services\Strategy;

class PaymentContext
{
    private PaymentMethodInterface $paymentMethod;

    public function setPaymentMethod(PaymentMethodInterface $paymentMethod): self
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    public function checkout(float $amount): string
    {
        if (! isset($this->paymentMethod)) {
            throw new \RuntimeException('No payment method has been set.');
        }

        return $this->paymentMethod->pay($amount);
    }

    public function getPaymentMethodName(): string
    {
        if (! isset($this->paymentMethod)) {
            throw new \RuntimeException('No payment method has been set.');
        }

        return $this->paymentMethod->getName();
    }
}
