<?php

// Load Composer's autoloader
require_once __DIR__ . '/../vendor/autoload.php';

// Import class UsersController from app/controllers/UsersController.php
use app\controllers\UsersController;

// Check if the request method is defined and not empty
if (isset($_SERVER['REQUEST_METHOD']) && !empty($_SERVER['REQUEST_METHOD'])) {

    try {
        // Create new instance of UsersController
        $userController = new UsersController();

        // Check the request method and call appropriate method in UsersController
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $userController->index();
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userController->create();
        } else {
            http_response_code(405);
            echo 'Method not allowed';
        }
    } catch (Exception $e) {
        http_response_code(500);
        echo 'Internal Server Error';
        error_log($e->getMessage());
    }
} else {
    http_response_code(400);
    echo 'Bad Request';
}
