<?php

namespace invoices;

class SalesTaxServices
{

    public function salesTax($amount):float
    {
        return $amount * .4;
    }

}