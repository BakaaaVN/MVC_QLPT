<?php 

class chitietdonhangModel extends ModelBase{

    public function getDetailOrder($id){
        $query = "SELECT * FROM chitietdonhang WHERE MaDH = ?";
        return $this->Query($query, [$id])->fetchAll(PDO::FETCH_OBJ);
    }
}