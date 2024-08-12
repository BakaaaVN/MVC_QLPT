<?php
    require_once './Authme/Authentication.php';
    class SuaDonhang extends ControllerBase {
        private $authmeModel;
        private $Middleware;
        private $donhangModel;
        public function __construct() {
            $this->authmeModel = $this->Model("Authentication");
            $this->Middleware = new Middleware();
            $this->donhangModel = $this->Model("donhangModel");
        }
        public function index() {
            $postdata = file_get_contents("php://input");
            $jsondata = json_decode($postdata, true);
            $result = $this->donhangModel->editOrder($jsondata);
            header('Content-Type: application/json; charset=utf8');
            echo json_encode([
                "Message" => "Sửa thông tin đơn hàng thành công!",
                "status" => 200,
            ]);
        }
    }