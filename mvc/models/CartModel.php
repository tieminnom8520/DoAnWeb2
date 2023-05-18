<?php
    class CartModel extends db{
        function getAllOrders($user_id){
            $qr = "SELECT * FROM ct_don_dat WHERE user_taikhoan='".$user_id."'";
            return mysqli_query($this->connect, $qr);
        }

        function payOrder($order_id){
            $qr = "UPDATE ct_don_dat SET order_status=1 WHERE order_id='".$order_id."'";
            mysqli_query($this->connect, $qr);
        }

        function removeOrder($order_id, $order_status){
            if ($order_status == 0){
                $qr = "DELETE FROM ct_don_dat WHERE order_id='".$order_id."'";
                mysqli_query($this->connect, $qr);
            }
            else {
                $qr = "UPDATE ct_don_dat SET order_in_cart=0 WHERE order_id='".$order_id."'";
                mysqli_query($this->connect, $qr);
            }
        }
    }
?>