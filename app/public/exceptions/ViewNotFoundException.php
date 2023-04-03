<?php

namespace exceptions;

class ViewNotFoundException extends \Exception
{
    protected $message = "View is not found";
}