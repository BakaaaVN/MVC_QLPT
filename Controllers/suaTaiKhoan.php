<?php
    require_once './Authme/Authentication.php';
    class SuaTaikhoan extends ControllerBase {
        private $authmeModel;
        private $Middleware;
        private $taikhoanModel;
        public function __construct() {
            $this->authmeModel = $this->Model("Authentication");
            $this->Middleware = new Middleware();
            $this->taikhoanModel = $this->Model("taikhoanModel");
        }
        public function index() {
            $postdata = file_get_contents("php://input");
            $jsondata = json_decode($postdata, true);
            $result = $this->taikhoanModel->editAccount($jsondata);
            header('Content-Type: application/json; charset=utf8');
            echo json_encode([
                "Message" => "Sửa tài khoản thành công!",
                "status" => 200,
            ]);
        }
    }   