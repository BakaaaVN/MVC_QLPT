<?php
    require_once './Authme/Authentication.php';
    class SuaDanhmuc extends ControllerBase {
        private $authmeModel;
        private $Middleware;
        private $danhmucModel;
        public function __construct() {
            $this->authmeModel = $this->Model("Authentication");
            $this->Middleware = new Middleware();
            $this->danhmucModel = $this->Model("danhmucModel");
        }
        public function index() {
            $postdata = file_get_contents("php://input");
            $jsondata = json_decode($postdata, true);
            $result = $this->danhmucModel->editCategory($jsondata);
            header('Content-Type: application/json; charset=utf8');
            echo json_encode([
                "Message" => "Sửa danh mục thành công!",
                "status" => 200,
            ]);
        }
    }