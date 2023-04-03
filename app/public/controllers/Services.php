<?php

declare(strict_types=1);
namespace controllers;

use views\View;

class Services
{
    public function index():void
    {
        View::make('/services', ['page_name'=>'Services']);
    }
}