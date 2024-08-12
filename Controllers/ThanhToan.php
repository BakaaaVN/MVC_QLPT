<?php
    require_once './Authme/Authentication.php';
    require_once './vendor/autoload.php';
    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;
    class ThanhToan extends ControllerBase {
        private $authmeModel;
        private $thanhtoanModel;
        private $Middleware;
        public function __construct() {
            $this->authmeModel = $this->Model("Authentication");
            $this->Middleware = new Middleware;
            $this->thanhtoanModel = $this->Model("thanhtoanModel");
        }
        public function createOrderID() {
            $this->Middleware->AuthenticationUser($this->authmeModel);

            $postdata = file_get_contents("php://input");
            $jsondata = json_decode($postdata, true);
            $result = $this->thanhtoanModel->generateOrderID($jsondata['data']);
            header('Content-Type: application/json; charset=utf8');
            echo json_encode([
                "Message" => "Sửa sản phẩm thành công!",
                "status" => 200,
                "OrderID" => $result,
            ]);
        }
        public function index($id) {
            $this->Middleware->AuthenticationUser($this->authmeModel);

            $userid = JWT::decode($_COOKIE['AuthenticationUser'], new Key("Key", 'HS256'));
            $user = $this->authmeModel->getUser($userid->UserID);

            $this->View("index", "Home", [
                "Page" => "thanhtoan",
                "Payment" => $this->thanhtoanModel->loadPaymentInfo(),
                "User" => $user,
                "OrderID" => $id,
            ]);
        }
    }