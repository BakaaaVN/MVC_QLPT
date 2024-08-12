<?php
require_once './Authme/Authentication.php';
require_once './vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
    class Giohang extends ControllerBase {
        private $giohangModel;
        private $homemodel;
        private $Middleware;
        private $authmeModel;
        public function __construct() {
            $this->giohangModel = $this->Model("giohangModel");
            $this->Middleware = new Middleware();
            $this->homemodel = $this->Model("homeModel");
            $this->authmeModel = $this->Model("Authentication");
        }
        public function index() {
            $this->Middleware->AuthenticationUser($this->authmeModel);

            $user = "";
            if(isset($_COOKIE['AuthenticationUser'])) {
                $name = JWT::decode($_COOKIE['AuthenticationUser'], new Key("Key", 'HS256'));
                $user = $this->authmeModel->getUser($name->UserID);
            }
            
            $this->View("index", "Home", [
                "Page" => "giohang",
                "User" => $user,
                "danhmuc" => $this->homemodel->getCategory(),
                "cart" => $this->giohangModel->getCartItem(),
            ]);
        }
        public function addCart() {
            $this->Middleware->AuthenticationUser($this->authmeModel);
            $postdata = file_get_contents("php://input");
            $jsondata = json_decode($postdata, true);
            $this->giohangModel->addToCart($jsondata['MaSP'], $jsondata['SoLuong']);
            header('Content-Type: application/json; charset=utf8');
            echo json_encode([
                "Message" => "succes",
                "status" => 200
            ]);
        }
        public function updateCart() {
            $this->Middleware->AuthenticationUser($this->authmeModel);
            $postdata = file_get_contents("php://input");
            $jsondata = json_decode($postdata, true);
            $this->giohangModel->updateCart($jsondata['MaSP'], $jsondata['SoLuong']);
            header('Content-Type: application/json; charset=utf8');
            echo json_encode([
                "Message" => "succes",
                "status" => 200
            ]);
        }
        public function removeCart($id) {
            $this->Middleware->AuthenticationUser($this->authmeModel);
            $this->giohangModel->removeFromCart($id);
            header("Location: ../../Giohang/index");
            $this->View("index", "Home", [  
                "Page" => "giohang",
                "danhmuc" => $this->homemodel->getCategory(),
                "cart" => $this->giohangModel->getCartItem(),
            ]);
        }
    }