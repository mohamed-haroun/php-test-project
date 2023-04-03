<?php

declare(strict_types=1);
namespace invoices;

class PaymentGatewayServices
{

    public function payInvoice(float $invoice):string {
        $paid = (bool)mt_rand(0, 1);

        return ($paid)? "Invoice is paid successfully" : "Failed to pay";
    }

}