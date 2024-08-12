<?php
    class detailmodel extends ModelBase {
        public function getProductDetail($id) {
            $query = "SELECT * FROM SANPHAM WHERE MASP = ?";
            return $this->Query($query, [$id])->fetch(PDO::FETCH_ASSOC);
        }
        public function getCategoryName($id) {
            $query = "SELECT * FROM DANHMUC dm, SANPHAM sp WHERE sp.MaDM = dm.MaDM AND sp.MaSP = ?";
            return $this->Query($query, [$id])->fetch(PDO::FETCH_ASSOC);
        }
    }