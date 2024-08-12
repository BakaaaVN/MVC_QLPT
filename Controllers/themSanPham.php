<?php
require_once './Authme/Authentication.php';
class ThemSanPham extends ControllerBase {
    private $AuthmeModel;
    private $Middleware;
    private $sanphamModel;
    public function __construct() {
        $this->AuthmeModel = $this->Model("Authentication");
        $this->Middleware = new Middleware();
        $this->sanphamModel = $this->Model("sanphamModel");
    }
    public function index() {
        $postdata = file_get_contents("php://input");
        $jsondata = json_decode($postdata, true);
        $result = $this->sanphamModel->addProduct($jsondata['id'], $jsondata['name'], $jsondata['desc'], $jsondata['price'], $jsondata['inventory'], $jsondata['image'], $jsondata['category']);
        
        header('Content-Type: application/json; charset=utf8');
        echo json_encode([
            "Message" => "Thêm sản phẩm thành công!",
            "status" => 200,
        ]);
    }
}