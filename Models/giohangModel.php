<?php
    session_start();
    class GiohangModel extends ModelBase {
        public function getCartItem() {
            $result = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
            $cartItems = [];
            foreach($result as $key => $MaSP) {
                $query = "SELECT * FROM SANPHAM WHERE MaSP = ?";
                $items = $this->Query($query, [$key])->fetchAll(PDO::FETCH_ASSOC);
                foreach($items as $item) {
                    $item['SoLuong'] = $_SESSION['cart'][$item['MaSP']];
                    $cartItems[] = $item;
                }
            }
            return $cartItems;
        }
        public function addToCart($masp, $soluong) {
            if(!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }
            if(isset($_SESSION['cart'][$masp])) {
                $_SESSION['cart'][$masp] += $soluong;
            } else {
                $_SESSION['cart'][$masp] = $soluong;
            }
        }
        public function removeFromCart($masp) {
            if(isset($_SESSION['cart'][$masp])) {
                unset($_SESSION['cart'][$masp]);
            }
        }
        public function updateCart($masp, $soluong) {
            if(isset($_SESSION['cart'][$masp])) {
                $_SESSION['cart'][$masp] = $soluong;
            }
        }
    }