<?php

namespace controllers;

use views\View;

class Home
{
    public function index(): void
    {
        View::make('/home', ['page_name'=>'Home']);
    }

    public function contact(): void
    {
        View::make('/contact', ['page_name'=>'Contact Us']);
    }
}