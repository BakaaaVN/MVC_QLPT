<?php
    require_once './Authme/Authentication.php';
    class SuaKhachhang extends ControllerBase {
        private $authmeModel;
        private $Middleware;
        private $khachhangModel;
        public function __construct() {
            $this->authmeModel = $this->Model("Authentication");
            $this->Middleware = new Middleware();
            $this->khachhangModel = $this->Model("khachhangModel");
        }
        public function index() {
            $postdata = file_get_contents("php://input");
            $jsondata = json_decode($postdata, true);
            $result = $this->khachhangModel->editUser($jsondata);
            header('Content-Type: application/json; charset=utf8');
            echo json_encode([
                "Message" => "Sửa khách hàng thành công!",
                "status" => 200,
            ]);
        }
    }