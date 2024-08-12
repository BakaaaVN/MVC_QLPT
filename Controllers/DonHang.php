<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
require_once './Authme/Authentication.php';
class DonHang extends ControllerBase
{
    private $AuthmeModel;
    private $Middleware;
    private $donhangModel;
    public function __construct()
    {
        $this->AuthmeModel = $this->Model("Authentication");
        $this->Middleware = new Middleware();
        $this->donhangModel = $this->Model("donhangModel");
    }
    public function index()
    {
        $this->Middleware->AuthenticationAdmin($this->AuthmeModel);

        $name = JWT::decode($_COOKIE['AuthenticationAdmin'], new Key("Key", 'HS256'));

        $donhang = $this->donhangModel->GetAll();
        $this->View("index","Admin",[
            "Page"=> "donhang",
            "User" => $name->Username,
            "Title" => "Danh sách đơn hàng",
            "donhang"=> $donhang
        ]);
    }
    public function add() {
        $this->Middleware->AuthenticationAdmin($this->AuthmeModel);

        $name = JWT::decode($_COOKIE['AuthenticationAdmin'], new Key("Key", 'HS256'));

        $this->View("index","Admin",[
            "Page"=> "themdonhang",
            "User" => $name->Username,
            "Title" => "Tạo đơn hàng mới",
        ]);
    }
    public function Delete(){
        $this->Middleware->AuthenticationAdmin($this->AuthmeModel);
        $postData = file_get_contents("php://input");
        $jsonData = json_decode($postData, true);
        $id = $jsonData["id"];  
        $noti = $this->donhangModel->deleteOrder($id);
        header('Content-Type: application/json; charset=utf8');
        echo json_encode([
            "Message" => "succes",
            "status" => 200
        ]);
    }
    public function Details($id){
        $this->Middleware->AuthenticationAdmin($this->AuthmeModel);

        $name = JWT::decode($_COOKIE['AuthenticationAdmin'], new Key("Key", 'HS256'));

        $khachhang = $this->donhangModel->getUserId($id);
        $donhang = $this->donhangModel->getOrder($id);
        $this->View("index","Admin",[
            "Page"=> "thongtindonhang",
            "Title" => "Thông tin đơn hàng",
            "User" => $name->Username,
            "khachhang" => $khachhang,
            "donhang"=> $donhang
        ]);
    }
}
