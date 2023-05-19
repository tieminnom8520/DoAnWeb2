<?php
    class paymentModel extends db{
        
        public function add($id, $ten, $diachi, $sdt, $ghichu, $tongtien, $date){
            $qr = "INSERT INTO don_dat_hang (Ten, diachi, SDT, ghichu, tongcong, id_khachhang, ngaydat) 
            VALUES ('".$ten."','".$diachi."', '".$sdt."', '".$ghichu."', '".$tongtien."', '".$id."', '".$date."')";
            mysqli_query($this->connect, $qr);
        }
    }
?>