<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
require_once './Authme/Authentication.php';
class DanhMuc extends ControllerBase
{
    private $AuthmeModel;
    private $Middleware;
    private $danhmucModel;
    public function __construct()
    {
        $this->AuthmeModel = $this->Model("Authentication");
        $this->Middleware = new Middleware();
        $this->danhmucModel = $this->Model("danhmucModel");
    }
    public function index()
    {
        $this->Middleware->AuthenticationAdmin($this->AuthmeModel);

        $name = JWT::decode($_COOKIE['AuthenticationAdmin'], new Key("Key", 'HS256'));

        $danhmuc = $this->danhmucModel->GetAll();
        $this->View("index","Admin",[
            "Page"=> "danhmuc",
            "User" => $name->Username,
            "Title" => "Danh mục sản phẩm",
            "danhmuc"=> $danhmuc
        ]);
    }
    public function Add() {
        $this->Middleware->AuthenticationAdmin($this->AuthmeModel);

        $name = JWT::decode($_COOKIE['AuthenticationAdmin'], new Key("Key", 'HS256'));

        $this->View("index","Admin",[
            "Page"=> "themdanhmuc",
            "User" => $name->Username,
            "Title" => "Thêm danh mục",
        ]);
    }
    public function Details($id)
    {
        $this->Middleware->AuthenticationAdmin($this->AuthmeModel);

        $name = JWT::decode($_COOKIE['AuthenticationAdmin'], new Key("Key", 'HS256'));

        $danhmuc = $this->danhmucModel->getDanhMuc($id);
        $this->View("index","Admin",[
            "Page"=> "chitietdanhmuc",
            "Title" => "Chi tiết danh mục",
            "User" => $name->Username,
            "danhmuc" => $danhmuc
        ]);
    }
    public function Delete() {
        $this->Middleware->AuthenticationAdmin($this->AuthmeModel);
        $postData = file_get_contents("php://input");
        $jsonData = json_decode($postData, true);
        $id = $jsonData["id"];  
        $noti = $this->danhmucModel->deleteCategory($id);
        header('Content-Type: application/json; charset=utf8');
        echo json_encode([
            "Message" => "succes",
            "status" => 200
        ]);
    }
}
