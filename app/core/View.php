<?php
namespace app\core;

class View
{
    public function render($view, $data = [])
    {
        extract($data);

        include_once __DIR__ . "/../views/{$view}.php";
    }
}
