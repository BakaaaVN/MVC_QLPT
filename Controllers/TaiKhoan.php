<?php
require_once('./Authme/Authentication.php');
use Firebase\JWT\Key;
use Firebase\JWT\JWT;
    class TaiKhoan extends ControllerBase {
        private $authModel;
        private $Middleware;
        private $taikhoanModel;
        public function __construct() {
            $this->authModel = $this->Model("Authentication");
            $this->Middleware = new Middleware();
            $this->taikhoanModel = $this->Model("taikhoanModel");
        }
        public function index() {
            $this->Middleware->AuthenticationAdmin($this->authModel);

            $name = JWT::decode($_COOKIE['AuthenticationAdmin'], new Key("Key", 'HS256'));

            $accounts = $this->taikhoanModel->getAll();
            $this->View("index", "Admin", [
                "Page" => "taikhoan",
                "Title" => "Danh sách tài khoản",
                "User" => $name->Username,
                "accounts" => $accounts
            ]);
        }
    }