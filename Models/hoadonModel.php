<?php
    session_start();
    class HoadonModel extends ModelBase {
        public function createOrder($jsondata) {
            $createOrder = "INSERT INTO DONHANG VALUES(?, ?, ?, ?, ?, ?, ?)";
            $this->Query($createOrder, [$jsondata['MaDH'], $jsondata['MaKH'], $jsondata['NgayDat'], $jsondata['DuKien'], $jsondata['PhuongThuc'], $jsondata['TongTien'], $jsondata['TrangThai']])->fetchObject();
            $createGH = "INSERT INTO GIAOHANG VALUES(?,?,?,?)";
            $this->Query($createGH, [$jsondata['MaDH'], $jsondata['TenKH'], $jsondata['DiaChi'], $jsondata['SoDT']]);
            foreach($_SESSION['payment'] as $item) {
                $query = "INSERT INTO CHITIETDONHANG VALUES(?, ?, ?, ?)";
                $getsp = "SELECT * FROM SANPHAM WHERE MASP = ?";
                $result = $this->Query($getsp, [$item['MaSP']])->fetch(PDO::FETCH_ASSOC);
                $this->Query($query, [$jsondata['MaDH'], $item['MaSP'], $item['SoLuong'], $item['SoLuong'] * $result['Gia']])->fetchObject();
            }
            foreach ($_SESSION['payment'] as $item) {
                if (isset($_SESSION['cart'][$item['MaSP']])) {
                    unset($_SESSION['cart'][$item['MaSP']]);
                }
            }
        }
    }