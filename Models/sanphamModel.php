<?php 

class SanphamModel extends ModelBase{
    public function GetAll(){
        $query = "SELECT * FROM SANPHAM";
        return $this->Query($query,null)->fetchAll(PDO::FETCH_OBJ);
    }
    public function getDanhMuc(){
        $query = "SELECT * FROM DANHMUC";
        return $this->Query($query,null)->fetchAll(PDO::FETCH_OBJ);
    }
    public function getProduct($id) {
        $query = "SELECT * FROM SANPHAM WHERE MaSP = ?";
        return $this->Query($query, [$id])->fetch(PDO::FETCH_ASSOC);
    }
    public function deleteProduct($id) {
        $query = "DELETE FROM CHITIETDONHANG WHERE MASP = ?";
        $this->Query($query, [$id]);
        $query = "DELETE FROM SANPHAM WHERE MASP = ?";
        return $this->Query($query, [$id]);
    }
    public function addProduct($id, $name, $desc, $price, $inventory, $image, $category) {
        $query = "INSERT INTO SANPHAM(MaSP, TenSP, MoTa, Gia, TonKho, HinhAnh, MaDM) VALUES (?, ?, ?, ?, ?, ?, ?)";
        return $this->Query($query, [$id, $name, $desc, $price, $inventory, $image, $category]);
    }
    public function editProduct($jsondata) {
        $query = "UPDATE sanpham SET TenSP = ?,MoTa= ?,Gia= ?,TonKho= ?,HinhAnh= ?,MaDM= ? WHERE MASP = ?";
        return $this->Query($query, [$jsondata['name'], $jsondata['desc'], $jsondata['price'], $jsondata['inventory'], $jsondata['image'], $jsondata['category'], $jsondata['id']]);
    }
}