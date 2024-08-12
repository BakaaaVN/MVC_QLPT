<?php
class Middleware
{
    public function AuthenticationAdmin($model)
    {
        $check = $model->checkAdmin($_COOKIE['AuthenticationAdmin'] ?? "");
        if (!$check) {
            header("Location: /MVC_QLPT/LoginManager/index");
            exit();
        }
    }
    public function AuthenticationUser($model) {
        $check = $model->checkUser($_COOKIE['AuthenticationUser'] ?? "");
        if (!$check) {
            header("Location: /MVC_QLPT/LoginManager/Login");
            exit();
        }
    }
}