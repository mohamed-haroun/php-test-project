<?php

namespace invoices;

class EmailServices
{

    public function send(string $message):string
    {
        return "Email is sent with $message";
    }

}