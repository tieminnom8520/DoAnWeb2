<?php
    require_once "./mvc/core/basehref.php";
    Class payment extends Controller {
        function addToCart(){
            $date = date('Y-m-d H:i:s');
            $ten = $_POST['ten_thanhtoan'];
            $diachi = $_POST['diachi_thanhtoan'];
            $sdt = $_POST['sodienthoai_thanhtoan'];
            $ghichu = $_POST['ghichu_thanhtoan'];
            $tongtien = $_POST['tongtien_thanhtoan'];
            $id = $_SESSION['id_kh'];
            $this->model("paymentModel")->add($id,$ten, $diachi, $sdt, $ghichu, $tongtien,$date);
            header("Location: " . geturl(). "/products");
        }
    }
?>