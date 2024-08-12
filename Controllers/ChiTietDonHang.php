<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
require_once './Authme/Authentication.php';
class ChiTietDonHang extends ControllerBase
{
    private $AuthmeModel;
    private $Middleware;
    private $chitietdonhangModel;
    public function __construct()
    {
        $this->AuthmeModel = $this->Model("Authentication");
        $this->Middleware = new Middleware();
        $this->chitietdonhangModel = $this->Model("chitietdonhangModel");
    }
    public function Details($id){
        $this->Middleware->AuthenticationAdmin($this->AuthmeModel);

        $name = JWT::decode($_COOKIE['AuthenticationAdmin'], new Key("Key", 'HS256'));

        $donhang = $this->chitietdonhangModel->getDetailOrder($id);
        $this->View("index","Admin",[
            "Page"=> "chitietdonhang",
            "Title" => "Chi tiết đơn hàng",
            "User" => $name->Username,
            "chitiet"=> $donhang
        ]);
    }
}
