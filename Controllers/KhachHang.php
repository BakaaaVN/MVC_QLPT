<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
require_once './Authme/Authentication.php';
class KhachHang extends ControllerBase
{
    private $AuthmeModel;
    private $Middleware;
    private $khachhangModel;
    public function __construct()
    {
        $this->AuthmeModel = $this->Model("Authentication");
        $this->Middleware = new Middleware();
        $this->khachhangModel = $this->Model("khachhangModel");
    }
    public function index()
    {
        $this->Middleware->AuthenticationAdmin($this->AuthmeModel);

        $name = JWT::decode($_COOKIE['AuthenticationAdmin'], new Key("Key", 'HS256'));

        $khachhang = $this->khachhangModel->GetAll();
        $this->View("index","Admin",[
            "Page"=> "khachhang",
            "User" => $name->Username,
            "Title" => "Danh sách khách hàng",
            "khachhang"=> $khachhang
        ]);
    }
    public function Details($id)
    {
        $this->Middleware->AuthenticationAdmin($this->AuthmeModel);

        $name = JWT::decode($_COOKIE['AuthenticationAdmin'], new Key("Key", 'HS256'));

        $account = $this->khachhangModel->getAccount();
        $khachhang = $this->khachhangModel->getUser($id);
        $this->View("index","Admin",[
            "Page"=> "chitietkhachhang",
            "Title" => "Chi tiết khách hàng",
            "User" => $name->Username,
            "account" => $account,
            "khachhang"=> $khachhang
        ]);
    }
    public function Delete() {
        $this->Middleware->AuthenticationAdmin($this->AuthmeModel);
        $postData = file_get_contents("php://input");
        $jsonData = json_decode($postData, true);
        $id = $jsonData["id"];  
        $noti = $this->khachhangModel->deleteUser($id);
        header('Content-Type: application/json; charset=utf8');
        echo json_encode([
            "Message" => "succes",
            "status" => 200
        ]);
    }
}
