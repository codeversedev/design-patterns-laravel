<?php

namespace App\Services\Strategy;

class AfterPayPayment implements PaymentMethodInterface
{
    public function __construct(
        private int $instalments = 4,
    ) {}

    public function pay(float $amount): string
    {
        $perInstalment = round($amount / $this->instalments, 2);

        return "Paid \${$amount} via AfterPay in {$this->instalments} instalments of \${$perInstalment}.";
    }

    public function getName(): string
    {
        return 'AfterPay';
    }
}
