<?php
    class AuthenticationUser extends ControllerBase {
        private $userModel;
        public function __construct() {
            $this->userModel = $this->Model("Authentication");
        }
        public function UserLogin() {
            $postData = file_get_contents("php://input");
            $jsonData = json_decode($postData, true);
            $result = $this->userModel->LoginUser($jsonData['username'], $jsonData['password']);
            if($result) {
                setcookie('AuthenticationUser', $result, time() + (86400 * 30), '/');
                header("Content-Type: application/json; charset=utf8");
                echo json_encode(['data' => "Thành công", 'status' => 200]);
            }
        }        
        public function UserLogout() {
            setcookie('AuthenticationUser', '', time() - (86400 * 30), '/');
            header("Content-Type: application/json; charset=utf8");
            echo json_encode(['data' => "Thành công", 'status' => 200]);
        }
    }