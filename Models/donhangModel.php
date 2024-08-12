<?php 

class donhangModel extends ModelBase{
    public function GetAll(){
        $query = "SELECT * FROM donhang";
        return $this->Query($query,null)->fetchAll(PDO::FETCH_OBJ);
    }
    public function getUserId($id){
        $query = "SELECT * FROM khachhang WHERE MaKH = ?";
        return $this->Query($query, [$id])->fetch(PDO::FETCH_ASSOC);
    }
    public function getOrder($id){
        $query = "SELECT * FROM donhang WHERE MaDH = ?";
        return $this->Query($query, [$id])->fetch(PDO::FETCH_ASSOC);
    }
    public function deleteOrder($id){
        $query1 = "DELETE FROM giaohang WHERE MaDH = ?";
        $this->Query($query1, [$id]);
        $query2 = "DELETE FROM chitietdonhang WHERE MaDH = ?";
        $this->Query($query2, [$id]);
        $query = "DELETE FROM donhang WHERE MaDH = ?";
        return $this->Query($query, [$id]);
    }
    public function editOrder($jsondata){
        $query = "UPDATE donhang SET DuKien = ?, TrangThai = ? WHERE MaDH = ?";
        return $this->Query($query, [$jsondata['estimate'], $jsondata['status'], $jsondata['id']]);
    }
}