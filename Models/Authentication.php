<?php
require_once './vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Authentication extends ModelBase {
    public function LoginAdmin($username, $password) {
        $queryCheckUser = "SELECT * FROM TAIKHOAN WHERE TenTK = ? AND PHANQUYEN = 'admin'";
        $user = $this->Query($queryCheckUser, [$username])->rowCount();
        if($user > 0) {
            $queryGetAccount = "SELECT * FROM TAIKHOAN WHERE TenTK = ? AND MatKhau = ?";
            $result = $this->Query($queryGetAccount, [$username, $password])->fetchObject();
            if($result) {
                $payload = [
                    "AdminID" => $result->MaTK,
                    "Username" => $username
                ];
                $token = JWT::encode($payload, "Key", 'HS256');
                return $token;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    public function LoginUser($username, $password) {
        $queryCheckUser = "SELECT * FROM TAIKHOAN WHERE TenTK = ?";
        $user = $this->Query($queryCheckUser, [$username])->rowCount();
        if($user > 0) {
            $queryGetAccount = "SELECT TAIKHOAN.MaTK, TenKH FROM TAIKHOAN, KHACHHANG WHERE TenTK = ? AND MatKhau = ? AND KHACHHANG.MaTK = TAIKHOAN.MaTK";
            $result = $this->Query($queryGetAccount, [$username, $password])->fetchObject();
            if($result) {
                $payload = [
                    "UserID" => $result->MaTK,
                    "Username" => $result->TenKH,
                ];
                $token = JWT::encode($payload, "Key", 'HS256');
                return $token;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
    public function checkAdmin($token) {
        if($token) {
            $decoded = JWT::decode($token, new Key("Key", 'HS256'));
            $query = "SELECT * FROM TAIKHOAN WHERE MaTK = ?";
            $result = $this->Query($query, [$decoded->AdminID]);
            if($result) {
                return $decoded;
            } else return null;
        } else return null;
    }
    public function checkUser($token) {
        if($token) {
            $decoded = JWT::decode($token, new Key("Key", 'HS256'));
            $query = "SELECT * FROM TAIKHOAN WHERE MaTK = ?";
            $result = $this->Query($query, [$decoded->UserID]);
            if($result) {
                return $decoded;
            } else return null;
        } else return null;

    }
    public function getUser($id) {
        $query = "SELECT * FROM KHACHHANG WHERE MATK = ?";
        return $this->Query($query, [$id])->fetch(PDO::FETCH_ASSOC);
    }
}