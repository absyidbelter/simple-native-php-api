<?php
namespace app\core;

use app\core\View;

class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }
}
