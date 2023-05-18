<?php
    class paymentModel extends db{
        
        public function add($quantity, $user_taikhoan, $id_mon){
            $qr = "INSERT INTO ct_don_dat (quantity, user_taikhoan, id_mon) VALUES (".$quantity.", ".$user_taikhoan.", ".$id_mon.")";
            mysqli_query($this->connect, $qr);
        }
    }
?>