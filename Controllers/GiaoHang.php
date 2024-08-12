<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
require_once './Authme/Authentication.php';
class GiaoHang extends ControllerBase
{
    private $AuthmeModel;
    private $Middleware;
    private $giaohangModel;
    public function __construct()
    {
        $this->AuthmeModel = $this->Model("Authentication");
        $this->Middleware = new Middleware();
        $this->giaohangModel = $this->Model("giaohangModel");
    }
    public function Details($id){
        $this->Middleware->AuthenticationAdmin($this->AuthmeModel);

        $name = JWT::decode($_COOKIE['AuthenticationAdmin'], new Key("Key", 'HS256'));

        $giaohang = $this->giaohangModel->getDelivery($id);
        $this->View("index","Admin",[
            "Page"=> "giaohang",
            "Title" => "Thông tin giao hàng",
            "User" => $name->Username,
            "giaohang"=> $giaohang
        ]);
    }
}
