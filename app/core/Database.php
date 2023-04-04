<?php 
namespace app\core;

use app\config\Config as Config;
use PDO;
use PDOException;

class Database {
    protected $pdo;

    public function __construct()
    {
        $config = Config::getInstance()->getConfig();
        $dsn = "pgsql:host={$config['host']};dbname={$config['database']}";
        $user = $config['username'];
        $password = $config['password'];

        try {
            $this->pdo = new PDO($dsn, $user, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Failed to connect to database: " . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->pdo;
    }
}
