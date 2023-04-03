<?php
declare(strict_types=1);
namespace views;
use exceptions\ViewNotFoundException;
class View
{
    public static function make(string $page, array $parameters = []): void
    {
        try {
            $viewPath = VIEW_PATH . $page . ".php";

            if(! file_exists($viewPath)) {
                throw new ViewNotFoundException();
            }

            include $viewPath;
        } catch (ViewNotFoundException $exception) {
            echo "<h1 style='text-align: center'>" . $exception->getMessage() . "</h1>";
        }
    }
}