<?php

namespace invoices;

class InvoiceServices
{
    public function __construct(
        private readonly PaymentGatewayServices $paymentGatewayServices,
        private readonly EmailServices          $emailServices,
        private readonly SalesTaxServices $salesTaxServices
    )
    {
    }


    public function invoice($amount):string
    {
        $totalAmount = $amount + $this->salesTaxServices->salesTax($amount);

        $message = $totalAmount . ' ' .$this->paymentGatewayServices->payInvoice($totalAmount);

        return $this->emailServices->send($message);
    }
}