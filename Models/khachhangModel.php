<?php 
    class khachhangModel extends ModelBase {
        public function GetAll(){
            $query = "SELECT * FROM khachhang, taikhoan WHERE khachhang.MaTK = taikhoan.MaTK";
            return $this->Query($query,null)->fetchAll(PDO::FETCH_OBJ);
        }

        public function GenerateUserId(){
            $number = 0;
            $sql = "SELECT * FROM KHACHHANG WHERE MaKH = ?";
            $flag = true;

            do{
                $khId = "KH";
                if($number >= 100){
                    $khId .= $number;
                }else if($number < 10){
                    $khId .= "00";
                    $khId .= $number;
                }else if($number < 100){
                    $khId .= "0";
                    $khId .= $number;
                }
                $resultCheckId = $this->Query($sql, [$khId])->fetch(PDO::FETCH_ASSOC);
                $flag = ($resultCheckId !== false);
                $number++;
            }while($flag);

            return $khId;
        }
        public function editUser($jsondata) {
            $query = "UPDATE khachhang SET TenKH = ?,GioiTinh= ?,NgaySinh= ?,SoDT= ?,DiaChi= ?,Email= ?, MaTK = ? WHERE MaKH = ?";
            return $this->Query($query, [$jsondata['name'], $jsondata['sex'], $jsondata['birthday'], $jsondata['phone'], $jsondata['address'], $jsondata['email'], $jsondata['accountId'], $jsondata['id']]);
        }
        public function getAccount(){
            $query = "SELECT * FROM taikhoan";
            return $this->Query($query,null)->fetchAll(PDO::FETCH_OBJ);
        }
        public function getUser($id) {
            $query = "SELECT * FROM khachhang WHERE MaKH = ?";
            return $this->Query($query, [$id])->fetch(PDO::FETCH_ASSOC);
        }
        public function deleteUser($id) {
            $query = "DELETE FROM khachhang WHERE MaKH = ?";
            return $this->Query($query, [$id]);
        }
    }