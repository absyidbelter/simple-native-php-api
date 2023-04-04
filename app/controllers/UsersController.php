<?php
namespace app\controllers;

use app\core\Controller;
use app\models\UserModel;

class UsersController extends Controller
{
    public function index()
    {
        $userModel = new UserModel();
        $users = $userModel->all();

        $this->view->render("user/index", compact("users"));
    }

    public function create()
    {
        $name = $_POST["name"];
        $email = $_POST["email"];

        $userModel = new UserModel();
        $user_id = $userModel->create($name, $email);

        header("Location: /user/{$user_id}");
        exit;
    }
}
