<?php
    class LoginManager extends ControllerBase {
        private $authModel;
        public function __construct() {
            $this->authModel = $this->Model("Authentication");
        }
        public function index() {
            $check = $this->authModel->checkAdmin($_COOKIE['AuthenticationAdmin'] ?? "");
            if(!$check) {
                $this->View('Login', "Admin");
            } else {
                header("Location: /MVC_qlpt/Admin/index");
                exit();
            }
        }
        public function Register() {
            $this->View('register', "Admin");
        }
        public function Login() {
            $this->View("Login", "Home");
        }
    }