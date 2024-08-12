<?php
require_once './Authme/Authentication.php';
class themTaiKhoan extends ControllerBase {
    private $AuthmeModel;
    private $Middleware;
    private $taikhoanModel;
    public function __construct() {
        $this->AuthmeModel = $this->Model("Authentication");
        $this->Middleware = new Middleware();
        $this->taikhoanModel = $this->Model("taikhoanModel");
    }
    public function index() {
        $postdata = file_get_contents("php://input");
        $jsondata = json_decode($postdata, true);
        $result = $this->taikhoanModel->addAccount($jsondata['name'], $jsondata['password'], $jsondata['role']);
        
        header('Content-Type: application/json; charset=utf8');
        echo json_encode([
            "Message" => "Thêm tài khoản thành công!",
            "status" => 200,
        ]);
    }
}