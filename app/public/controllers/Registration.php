<?php
namespace controllers;
use views\View;

class Registration
{
    public function login():void
    {
        View::make('/login', ['page_name'=>'Login']);
    }
    public function register():void {
        View::make('/register', ['page_name'=>'Register']);
    }
}