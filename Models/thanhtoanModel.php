<?php
    session_start();
    class ThanhtoanModel extends ModelBase {
        public function generateOrderID($jsondata) {
            $this->savePaymentInfo($jsondata);
            $number = 1;
            $queryCheckID = "SELECT * FROM DONHANG WHERE MaDH = ?";
            $flag = true;
            do {
                $dhID = "DH";
                if($number >= 100)
                    $dhID .= $number;
                else if($number < 10) {
                    $dhID .= "00";
                    $dhID .= $number;
                } else if ($number < 100) {
                    $dhID .= "0";
                    $dhID .= $number;
                }
                $resultCheckID = $this->Query($queryCheckID, [$dhID])->fetch(PDO::FETCH_ASSOC);
                $flag = ($resultCheckID !== false);
                $number++;
            } while($flag);
            return $dhID;
        }
        public function loadPaymentInfo() {
            $selectedItem = [];
            foreach($_SESSION['payment'] as $paymentItem) {
                $MaSP = $paymentItem['MaSP'];
                $SoLuong = $paymentItem['SoLuong'];
        
                $query = "SELECT * FROM SANPHAM WHERE MaSP = ?";
                $items = $this->Query($query, [$MaSP])->fetchAll(PDO::FETCH_ASSOC);
                
                foreach($items as $item) {
                    $item['SoLuong'] = $SoLuong;
                    $selectedItem[] = $item;
                }
            }
            return $selectedItem;
        }
        public function savePaymentInfo($jsondata) {
            $result = [];
            if(isset($_SESSION['payment'])) {
                unset($_SESSION['payment']);
            }
            foreach($jsondata as $selectedItem) {
                $id = $selectedItem['MaSP'];
                if(isset($_SESSION['cart'][$id])) {
                    $result = [
                        "MaSP" => $id,
                        "SoLuong" => $_SESSION['cart'][$id],
                    ];
                    $_SESSION['payment'][] = $result;
                }
            }
        }
    }