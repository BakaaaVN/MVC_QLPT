<?php
    require_once './vendor/autoload.php';
    require_once './Authme/Authentication.php';
    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;
    class Chitietsanpham extends ControllerBase {
        private $detailmodel;
        private $homemodel;
        private $authmeModel;
        public function __construct() {
            $this->detailmodel = $this->Model("detailmodel");
            $this->homemodel = $this->Model("homeModel");
            $this->authmeModel = $this->Model("Authentication");
        }
        public function Details($id) {
            $user = "";
            if(isset($_COOKIE['AuthenticationUser'])) {
                $name = JWT::decode($_COOKIE['AuthenticationUser'], new Key("Key", 'HS256'));
                $user = $this->authmeModel->getUser($name->UserID);
            }
            $this->View("index", "Home", [
                "Page" => "chitietsanpham",
                "User" => $user,
                "danhmuc" => $this->homemodel->getCategory(),
                "name" => $this->detailmodel->getCategoryName($id),
                "sanpham" => $this->detailmodel->getProductDetail($id),
            ]);
        }
    }