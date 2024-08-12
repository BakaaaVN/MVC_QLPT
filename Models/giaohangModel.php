<?php 

class giaohangModel extends ModelBase{

    public function getDelivery($id){
        $query = "SELECT * FROM giaohang WHERE MaDH = ?";
        return $this->Query($query, [$id])->fetchAll(PDO::FETCH_OBJ);
    }

}