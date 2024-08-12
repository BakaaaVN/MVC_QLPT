<?php
    require_once './vendor/autoload.php';
    require_once './Authme/Authentication.php';
    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;
    class Account extends ControllerBase {
        private $authmeModel;
        private $accountModel;
        private $Middleware;
        private $homeModel;
        public function __construct() {
            $this->authmeModel = $this->Model("Authentication");
            $this->accountModel = $this->Model("accountModel");
            $this->homeModel = $this->Model("homeModel");
            $this->Middleware = new Middleware();
        }
        public function index() {
            $this->Middleware->AuthenticationUser($this->authmeModel);
            $name = JWT::decode($_COOKIE['AuthenticationUser'], new Key("Key", 'HS256'));
            $user = $this->authmeModel->getUser($name->UserID);
            $this->View("index", "Customer", [
                "Page" => "thongtin",
                "User" => $user,
                "danhmuc" => $this->homeModel->getCategory(),
            ]);
        }
        public function orderHistory() {
            $this->Middleware->AuthenticationUser($this->authmeModel);
            $name = JWT::decode($_COOKIE['AuthenticationUser'], new Key("Key", 'HS256'));
            $user = $this->authmeModel->getUser($name->UserID);
            $data = $this->accountModel->getOrder($user['MaKH']);
            $this->View("index", "Customer", [
                "Page" => "lichsumuahang",
                "User" => $user,
                "Order" => $data,
                "danhmuc" => $this->homeModel->getCategory(),
            ]);
        }
        public function orderDetail($id) {
            $this->Middleware->AuthenticationUser($this->authmeModel);
            $name = JWT::decode($_COOKIE['AuthenticationUser'], new Key("Key", 'HS256'));
            $user = $this->authmeModel->getUser($name->UserID);
            $data = $this->accountModel->getOrderDetail($id);
            $this->View("index", "Customer", [
                "Page" => "chitietdonhang",
                "id" => $id,
                "User" => $user,
                "Order" => $data,
                "danhmuc" => $this->homeModel->getCategory(),
            ]);
        }
        public function updatePassword() {
            $this->Middleware->AuthenticationUser($this->authmeModel);
            $name = JWT::decode($_COOKIE['AuthenticationUser'], new Key("Key", 'HS256'));
            $user = $this->authmeModel->getUser($name->UserID);
            $this->View("index", "Customer", [
                "Page" => "capnhatmatkhau",
                "User" => $user,
                "danhmuc" => $this->homeModel->getCategory(),
            ]);
        }
        public function Address() {
            $this->Middleware->AuthenticationUser($this->authmeModel);
            $name = JWT::decode($_COOKIE['AuthenticationUser'], new Key("Key", 'HS256'));
            $user = $this->authmeModel->getUser($name->UserID);
            $this->View("index", "Customer", [
                "Page" => "diachinhanhang",
                "User" => $user,
                "danhmuc" => $this->homeModel->getCategory(),
            ]);
        }
        public function updateAddress() {
            $this->Middleware->AuthenticationUser($this->authmeModel);
            $postdata = file_get_contents("php://input");
            $jsondata = json_decode($postdata, true);
            $result = $this->accountModel->updateAccountAddress($jsondata);
            header('Content-Type: application/json; charset=utf8');
            echo json_encode([
                "Message" => "success",
                "status" => 200
            ]);
        }
        public function updateAccount() {
            $this->Middleware->AuthenticationUser($this->authmeModel);
            $postdata = file_get_contents("php://input");
            $jsondata = json_decode($postdata, true);
            $this->accountModel->updateAccount($jsondata);
            header('Content-Type: application/json; charset=utf8');
            echo json_encode([
                "Message" => "success",
                "status" => 200
            ]);
        }
        public function updateAccountPassword() {
            $this->Middleware->AuthenticationUser($this->authmeModel);
            $postdata = file_get_contents("php://input");
            $jsondata = json_decode($postdata, true);
            $result = $this->accountModel->updateAccountPassword($jsondata);
            header('Content-Type: application/json; charset=utf8');
            if($result) {
                echo json_encode([
                    "Message" => "succes",
                    "status" => 200
                ]);
            } else {
                echo json_encode([
                    "Message" => "failed",
                    "status" => 400
                ]);
            }
        }
    }