<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
require_once('./Authme/Authentication.php');
class TrangChu extends ControllerBase
{
    private $AuthmeModel;
    private $Middleware;
    private $trangchuModel;
    public function __construct()
    {
        $this->AuthmeModel = $this->Model("Authentication");
        $this->Middleware = new Middleware();
        $this->trangchuModel = $this->Model("trangchuModel");
    }
    public function index()
    {
        $this->Middleware->AuthenticationAdmin($this->AuthmeModel);

        $name = JWT::decode($_COOKIE['AuthenticationAdmin'], new Key("Key", 'HS256'));
        
        $info = array();
        $info = $this->trangchuModel->GetAll();
        $this->View("index","Admin",[
            "Page"=> "trangchu",
            "Title" => "Dashboard",
            "User" => $name->Username,
            "trangchu"=> $info
        ]);
    }
}
