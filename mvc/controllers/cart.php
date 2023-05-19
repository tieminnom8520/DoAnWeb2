<?php
    require_once "./mvc/core/basehref.php";
    Class Cart extends Controller {
        function defaultView(){
            $user_id = $_SESSION['username'];
            $cartDB = $this->model("CartModel");
            $productDB = $this->model("ProductsModel");
            
            $orderList = array();
            $quantityList = array();
            $orderIdList = array();
            $orderStatusList = array();

            // foreach ($cartDB->getAllOrders($user_id) as $order){
            //     if($order["id_mon"] and $order["order_in_cart"] == 1) {
            //         $product = mysqli_fetch_array($productDB->getProduct($order["id_mon"]));
            //         array_push($orderList, $product);
            //         array_push($quantityList, $order["quantity"]);
            //         array_push($orderIdList, $order["order_id"]);
            //         array_push($orderStatusList, $order["order_status"]);
            //     }
            // }

            $this->view("CartView", [
                "all-order"=>$orderList,
                "all-quantity"=>$quantityList,
                "all-order-id"=>$orderIdList,
                "all-order-status"=>$orderStatusList,
            ]);
        }

        function pay($order_id){
            $cartDB = $this->model("CartModel");
            $cartDB->payOrder($order_id);
            header("Location: " . geturl(). "/cart");
        }

        function remove($order_id, $order_status){
            $cartDB = $this->model("CartModel");
            $cartDB->removeOrder($order_id, $order_status);
            header("Location: " . geturl(). "/cart");
        }
    }
?>