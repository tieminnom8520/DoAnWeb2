<?php
    require_once "./mvc/core/basehref.php";
    Class payment extends Controller {
        function addToCart(){
            $quantity = $_POST['quantity'];
            $user_taikhoan = $_POST['user_taikhoan'];
            $id_mon = $_POST['id_mon'];
            $this->model("paymentModel")->add($quantity, $user_taikhoan, $id_mon);
            header("Location: " . geturl(). "/products");
        }
    }
?>