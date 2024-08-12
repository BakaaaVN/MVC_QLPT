<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
require_once './Authme/Authentication.php';
class SanPham extends ControllerBase
{
    private $ProductModel;
    private $AuthmeModel;
    private $Middleware;
    public function __construct()
    {
        $this->AuthmeModel = $this->Model("Authentication");
        $this->Middleware = new Middleware();
        $this->ProductModel = $this->Model("sanphamModel");
    }
    public function index()
    {
        $this->Middleware->AuthenticationAdmin($this->AuthmeModel);

        $name = JWT::decode($_COOKIE['AuthenticationAdmin'], new Key("Key", 'HS256'));

        $products = $this->ProductModel->GetAll();
        $this->View("index","Admin",[
            "Page" => "sanpham",
            "Title" => "Danh sách sản phẩm",
            "User" => $name->Username,
            "sanpham"=> $products
        ]);
    }
    public function Details($id)
    {
        $this->Middleware->AuthenticationAdmin($this->AuthmeModel);

        $name = JWT::decode($_COOKIE['AuthenticationAdmin'], new Key("Key", 'HS256'));

        $product = $this->ProductModel->getProduct($id);
        $danhmuc = $this->ProductModel->getDanhMuc();
        $this->View("index","Admin",[
            "Page"=> "chitietsanpham",
            "Title" => "Chi tiết sản phẩm",
            "User" => $name->Username,
            "danhmuc" => $danhmuc,
            "sanpham"=> $product
        ]);
    }
    public function Delete() {
        $this->Middleware->AuthenticationAdmin($this->AuthmeModel);
        $postData = file_get_contents("php://input");
        $jsonData = json_decode($postData, true);
        $id = $jsonData["id"];  
        $noti = $this->ProductModel->deleteProduct($id);
        header('Content-Type: application/json; charset=utf8');
        echo json_encode([
            "Message" => "succes",
            "status" => 200
        ]);
    }
    public function Add() {
        $this->Middleware->AuthenticationAdmin($this->AuthmeModel);

        $name = JWT::decode($_COOKIE['AuthenticationAdmin'], new Key("Key", 'HS256'));
        
        $danhmuc = $this->ProductModel->getDanhMuc();
        $this->View("index","Admin",[
            "Page"=> "themsanpham",
            "Title" => "Thêm sản phẩm",
            "User" => $name->Username,
            "danhmuc" => $danhmuc,
        ]);
    }
}
