<?php 

class trangchuModel extends ModelBase{
    public function GetAll(){
        $usercount = "SELECT * FROM khachhang";
        $productcount = "SELECT * FROM sanpham";
        $ordercount = "SELECT * FROM donhang";
        $sumprofit = "SELECT SUM(TongTien) as sumprofit FROM donhang";
        $results = array();

        $results['usercount'] = count($this->Query($usercount,null)->fetchAll(PDO::FETCH_OBJ));
        $results['productcount'] = count($this->Query($productcount,null)->fetchAll(PDO::FETCH_OBJ));
        $results['ordercount'] = count($this->Query($ordercount,null)->fetchAll(PDO::FETCH_OBJ));
        $results['sumprofit'] = $this->Query($sumprofit, null)->fetch(PDO::FETCH_OBJ);
        return $results;
    }
    public function getSanPham(){
        $query = "SELECT * FROM SANPHAM";
        return $this->Query($query,null)->fetchAll(PDO::FETCH_OBJ);
    }
}