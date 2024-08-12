<?php
require_once './vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
    class Home extends ControllerBase {
        private $homemodel;
        private $authmeModel;
        public function __construct() {
            $this->homemodel = $this->Model("homeModel");
            $this->authmeModel = $this->Model("Authentication");
        }
        public function index() {
            $user = "";
            if(isset($_COOKIE['AuthenticationUser'])) {
                $name = JWT::decode($_COOKIE['AuthenticationUser'], new Key("Key", 'HS256'));
                $user = $this->authmeModel->getUser($name->UserID);
            }
            $this->View("index", "Home", [
                "Page" => "TrangChu",
                "User" => $user,
                "danhmuc" => $this->homemodel->getCategory(),
                "danhmucs" => $this->homemodel->getCategoryOnProduct(),
                "promotion" => $this->homemodel->getPromotion(),
            ]);
        }
        public function SanPham() {
            $user = "";
            if(isset($_COOKIE['AuthenticationUser'])) {
                $name = JWT::decode($_COOKIE['AuthenticationUser'], new Key("Key", 'HS256'));
                $user = $this->authmeModel->getUser($name->UserID);
            }
            $this->View("index", "Home", [
                "Page" => "sanpham",
                "User" => $user,
                "sanpham" => $this->homemodel->getAllProducts(),
                "danhmuc" => $this->homemodel->getCategory(),
                "danhmucs" => $this->homemodel->getCategoryOnProduct(),
            ]);
        }
        public function DanhMuc($id) {
            $user = "";
            if(isset($_COOKIE['AuthenticationUser'])) {
                $name = JWT::decode($_COOKIE['AuthenticationUser'], new Key("Key", 'HS256'));
                $user = $this->authmeModel->getUser($name->UserID);
            }
            $this->View("index", "Home", [
                "Page" => "danhmuc",
                "User" => $user,
                "sanpham" => $this->homemodel->getProductFromCategory($id),
                "danhmuc" => $this->homemodel->getCategory(),
                "name" => $this->homemodel->getCategoryName($id),
            ]);
        }
    }