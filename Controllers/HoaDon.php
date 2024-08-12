<?php
    require_once './vendor/autoload.php';
    require_once './Authme/Authentication.php';
    class HoaDon extends ControllerBase {
        private $authmeModel;
        private $hoadonModel;
        private $Middleware;
        public function __construct() {
            $this->authmeModel = $this->Model("Authentication");
            $this->Middleware = new Middleware();
            $this->hoadonModel = $this->Model("hoadonModel");
        }
        public function createOrder() {
            $this->Middleware->AuthenticationUser($this->authmeModel);
            $postdata = file_get_contents("php://input");
            $jsondata = json_decode($postdata, true);
            $this->hoadonModel->createOrder($jsondata['orderinfo']);
            header('Content-Type: application/json; charset=utf8');
            echo json_encode([
                "Message" => "succes",
                "status" => 200
            ]);
        }
    }