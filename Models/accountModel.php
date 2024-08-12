<?php
    class AccountModel extends ModelBase {
        public function updateAccount($data) {
            $query = "UPDATE KHACHHANG SET TenKH = ?, GioiTinh = ?, SoDT = ?, Email = ? WHERE MaKH = ?";
            return $this->Query($query, [$data['name'], $data['gender'], $data['phone'], $data['email'], $data['id']])->fetchObject();
        }
        public function getOrder($id) {
            $query = "SELECT * FROM DONHANG WHERE MaKH = ?";
            return $this->Query($query, [$id])->fetchAll(PDO::FETCH_OBJ);
        }
        public function getOrderDetail($id) {
            $query = "SELECT s.TenSP, s.Gia, s.HinhAnh, c.SoLuong, c.ThanhTien FROM SANPHAM s, chitietdonhang c WHERE s.MaSP = c.MaSP AND c.MaDH = ?";
            return $this->Query($query, [$id])->fetchAll(PDO::FETCH_OBJ);
        }
        public function updateAccountPassword($data) {
            $query = "SELECT * FROM TAIKHOAN WHERE MATKHAU = ? AND MATK = ?";
            $result = $this->Query($query, [$data['oldpass'], $data['id']])->fetch(PDO::FETCH_OBJ);
            if($result) {
                $query = "UPDATE TAIKHOAN SET MATKHAU = ? WHERe MATK = ?";
                return $this->Query($query, [$data['newpass'], $data['id']]);
            } else return null;
        }
        public function updateAccountAddress($data) {
            $query = "UPDATE KHACHHANG SET DIACHI = ? WHERE MAKH = ?";
            return $this->Query($query, [$data['address'], $data['id']]);
        }
    }