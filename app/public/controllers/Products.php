<?php
declare(strict_types=1);
namespace controllers;

use views\View;

class Products
{
    public function showProducts():void
    {
        View::make('/products', ['page_name'=>'Products']);
    }
}