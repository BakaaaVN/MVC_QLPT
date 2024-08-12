<?php
require_once './Authme/Authentication.php';
class themDanhMuc extends ControllerBase {
    private $AuthmeModel;
    private $Middleware;
    private $danhmucModel;
    public function __construct() {
        $this->AuthmeModel = $this->Model("Authentication");
        $this->Middleware = new Middleware();
        $this->danhmucModel = $this->Model("danhmucModel");
    }
    public function index() {
        $postdata = file_get_contents("php://input");
        $jsondata = json_decode($postdata, true);
        $result = $this->danhmucModel->addCategory($jsondata['id'], $jsondata['name']);
        
        header('Content-Type: application/json; charset=utf8');
        echo json_encode([
            "Message" => "Thêm danh mục thành công!",
            "status" => 200,
        ]);
    }
}