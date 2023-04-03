<?php

require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
const VIEW_PATH = __DIR__ . '/views';

use boot\{App, Config};
use controllers\{Home, Registration, UserController, Products, Services, InvoicesController};
use router\Router;
use container\Container;

$container = new Container();

$router = new Router($container);

$router
    ->get("/",             [Home::class,             'index'])
    ->get("/contact",      [Home::class,             'contact'])
    ->get("/login",        [Registration::class,     "login"])
    ->get("/register",     [Registration::class,     "register"])
    ->post("/user-create", [UserController::class,     "createUser"])
    ->post("/user-login",  [UserController::class,     "userRetrieve"])
    ->get('/profile',      [UserController::class,   'profile'])
    ->get('/products',     [Products::class,         'showProducts'])
    ->get('/services',     [Services::class,          'index'])
    ->get('/invoice',      [InvoicesController::class,          'invoice']);



(new App(
    $router,
    ['request_method'=>$_SERVER['REQUEST_METHOD'], 'request_uri'=>$_SERVER['REQUEST_URI']],
    (new Config($_ENV))->db
))->run();