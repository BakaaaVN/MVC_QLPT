<?php 
    class TaikhoanModel extends ModelBase {
        public function getAll() {
            $query = "SELECT * FROM TAIKHOAN";
            return $this->Query($query, null)->fetchAll(PDO::FETCH_OBJ);
        }
        public function generateUserId(){
            $number = 0;
            $sql = "SELECT * FROM TAIKHOAN WHERE MaTK = ?";
            $flag = true;

            do{
                $tkId = "TK";
                if($number >= 100){
                    $tkId .= $number;
                }else if($number < 10){
                    $tkId .= "00";
                    $tkId .= $number;
                }else if($number < 100){
                    $tkId .= "0";
                    $tkId .= $number;
                }
                $resultCheckId = $this->Query($sql, [$tkId])->fetch(PDO::FETCH_ASSOC);
                $flag = ($resultCheckId !== false);
                $number++;
            }while($flag);

            return $tkId;
        }
        public function addAccount($name, $password, $role){
            $id = $this->generateUserId();
            $query = "INSERT INTO TAIKHOAN(MaTK, TenTK, MatKhau, PhanQuyen) VALUES(?, ?, ?, ?)";
            return $this->Query($query, [$id, $name, $password, $role]);
        }
        public function getTaiKhoan($id){
            $query = "SELECT * FROM TAIKHOAN WHERE MaTK = ?";
            return $this->Query($query, [$id])->fetch(PDO::FETCH_ASSOC);
        }
        public function editAccount($jsondata) {
            $query = "UPDATE taikhoan SET TenTK = ?,MatKhau= ?,PhanQuyen= ? WHERE MaTK = ?";
            return $this->Query($query, [$jsondata['name'], $jsondata['password'], $jsondata['role'], $jsondata['id']]);
        }
        public function deleteAccount($id){
            $query = "DELETE FROM taikhoan WHERE MaTK = ?";
            return $this->Query($query, [$id]);
        }
    }