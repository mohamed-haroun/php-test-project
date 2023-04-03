<?php

namespace exceptions;

class RouteNotFoundException extends \Exception
{
    protected $message = "404 Route is not found";
}