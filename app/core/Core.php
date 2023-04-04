<?php
namespace app\core;
// Load database configuration from .env file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Load database helper
require_once __DIR__ . '/../helpers/database_helper.php';

// Load response helper
require_once __DIR__ . '/../helpers/response_helper.php';

class App {

   protected $controller = 'UsersController';
   protected $method = 'index';
   protected $params = [];

   public function __construct() {
      $url = $this->parseUrl();

      if (file_exists(__DIR__ . '/../controllers/' . ucfirst($url[0]) . 'Controller.php')) {
         $this->controller = ucfirst($url[0]) . 'Controller';
         unset($url[0]);
      }

      require_once __DIR__ . '/../controllers/' . $this->controller . '.php';
      $this->controller = new $this->controller;

      if (isset($url[1])) {
         if (method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
         }
      }

      $this->params = $url ? array_values($url) : [];

      call_user_func_array([$this->controller, $this->method], $this->params);
   }

   public function parseUrl() {
      if (isset($_GET['url'])) {
         return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
      }
   }

}
