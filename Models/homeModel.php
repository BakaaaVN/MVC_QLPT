<?php
    class HomeModel extends ModelBase {
        public function getAllProducts() {
            $query = "SELECT * FROM SANPHAM";
            return $this->Query($query, null)->fetchAll(PDO::FETCH_OBJ);
        }
        public function getPromotion() {
            $query = "SELECT * FROM SANPHAM ORDER BY RAND() LIMIT 10";
            return $this->Query($query, null)->fetchAll(PDO::FETCH_OBJ);
        }
        public function getCategory() {
            $query = "SELECT * FROM DANHMUC";
            return $this->Query($query, null)->fetchAll(PDO::FETCH_OBJ);
        }
        public function getCategoryOnProduct() {
            $query = "SELECT dm.TenDM, dm.MaDM, sp.MaSP, sp.HinhAnh FROM DANHMUC dm JOIN SANPHAM sp ON dm.MaDM = sp.MaDM WHERE sp.MaSP IN (SELECT MIN(MaSP) FROM SANPHAM GROUP BY MaDM)";
            return $this->Query($query, null)->fetchAll(PDO::FETCH_OBJ);
        }
        public function getProductFromCategory($id) {
            $query = "SELECT * FROM SANPHAM WHERE MADM = ?";
            return $this->Query($query, [$id])->fetchAll(PDO::FETCH_OBJ);
        }
        public function getCategoryName($id) {
            $query = "SELECT * FROM DANHMUC WHERE MADM = ?";
            return $this->Query($query, [$id])->fetch(PDO::FETCH_ASSOC);
        }
    }