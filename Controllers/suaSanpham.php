<?php
    require_once './Authme/Authentication.php';
    class SuaSanpham extends ControllerBase {
        private $authmeModel;
        private $Middleware;
        private $sanphamModel;
        public function __construct() {
            $this->authmeModel = $this->Model("Authentication");
            $this->Middleware = new Middleware();
            $this->sanphamModel = $this->Model("sanphamModel");
        }
        public function index() {
            $postdata = file_get_contents("php://input");
            $jsondata = json_decode($postdata, true);
            $result = $this->sanphamModel->editProduct($jsondata);
            header('Content-Type: application/json; charset=utf8');
            echo json_encode([
                "Message" => "Sửa sản phẩm thành công!",
                "status" => 200,
            ]);
        }
    }