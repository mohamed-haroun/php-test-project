<?php

declare(strict_types=1);
namespace controllers;

use invoices\InvoiceServices;
use views\View;

class InvoicesController
{

    public function __construct(private InvoiceServices $invoiceServices)
    {
    }

    public function invoice():void
    {
        View::make('/invoice', ['page_name'=>'invoice', 'invoice_services'=>$this->invoiceServices]);
    }

}