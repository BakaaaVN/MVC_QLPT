<?php 

class danhmucModel extends ModelBase{
    public function GetAll(){
        $query = "SELECT * FROM danhmuc";
        return $this->Query($query,null)->fetchAll(PDO::FETCH_OBJ);
    }
    public function getDanhMuc($id) {
        $query = "SELECT * FROM DANHMUC WHERE MaDM = ?";
        return $this->Query($query, [$id])->fetch(PDO::FETCH_ASSOC);
    }
    public function addCategory($id, $name) {
        $query = "INSERT INTO DANHMUC(MaDM, TenDM) VALUES (?, ?)";
        return $this->Query($query, [$id, $name]);
    }
    public function editCategory($jsondata) {
        $query = "UPDATE danhmuc SET TenDM = ? WHERE MADM = ?";
        return $this->Query($query, [$jsondata['name'], $jsondata['id']]);
    }
    public function deleteCategory($id){
        $query = "DELETE FROM danhmuc WHERE MaDM = ?";
        return $this->Query($query, [$id]);
    }
}