<?php
    require_once "./mvc/core/basehref.php";
    $home_url = getUrl().'/';
    if (!$_SESSION['username']){
        header("Location: " . geturl(). "/login/loginView");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
            echo "<base href='${home_url}'>";
    ?>
    <title>Products Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        <?php include "./assets/css/cart.css" ?>
        <?php include "./assets/css/detail.css" ?>
        <?php include "./assets/css/home.css" ?>
    </style>

</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="./home"><img src="https://lh3.googleusercontent.com/d/1Rc3H-oqkp8BIRXpcL_EOUMlBeNf5CSll" alt="#"></a>
        </div>
        <div>
            <nav class="menu">
                <ul>
                    <li><a href="./home">Home</a></li>
                    <li><a href="products">Products</a></li>
                    <li><a style="background-color: #ffd452;" href="#"><img style="width:20px;padding:0px;" src="https://www.freeiconspng.com/thumbs/cart-icon/basket-cart-icon-27.png"></a></li>
                    <?php if($_SESSION['username'] = "1") echo "<li><a href=\"manage/viewProductPage/1\">Admin</a></li><li><a href=\"login/logout\">Logout</a></li>";
                    else echo "<li><a href=\"login/logout\">Logout</a></li>";?>
                </ul>
            </nav>
        </div>
    </div>

    <div class="cart">
        <h2>My Cart<img style="width:20px;padding:0px;margin-left:10px" src="https://www.freeiconspng.com/thumbs/cart-icon/basket-cart-icon-27.png"></h2>
        <div class="order-list">
            <?php 
                $order_no = 0;
                foreach($data["all-order"] as $order): 
                $order_no++;
            ?>
            <div class="order">
                <div class="order-number"><p><?=$order_no?></p></div>
                <div class="order-img"><img src="<?=$order["hinhanh"]?>"></div>
                <div class="order-infor"> 
                    <div class="">
                        <div class="name">
                            <?=$order["ten_mon"]?>
                        </div>
                        <div class="detail">
                            <div class="attribute"> 
                                Price: 
                                <div class="value" id="cost"><?=$order["product_price"]?>$</div>
                            </div>
                            <div class="attribute"> 
                                Category: 
                                <div class="value"><?=$order["Loai"]?></div>
                            </div>
                            <div class="attribute"> 
                                Quantity: 
                                <div class="value" id="quantity"><?=$data["all-quantity"][$order_no-1]?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="total">
                    <?php 
                        if ($data["all-order-status"][$order_no-1] == 0):
                    ?>
                        <a id="pay" href="cart/pay/<?=$data["all-order-id"][$order_no-1]?>">
                            <?=$data["all-quantity"][$order_no-1]*$order["product_price"]?>$
                        </a>
                    <?php
                        else: echo '<div id="paid">'.$data["all-quantity"][$order_no-1]*$order["product_price"].'$</div>';
                        endif;
                    ?>

                    <a id="remove" href="cart/remove/<?=$data["all-order-id"][$order_no-1]?>/<?=$data["all-order-status"][$order_no-1]?>">Remove</a>
                    
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="footer">
        <div class="useful-link">
            <h3>Get To Know Us</h3>
            <div><a href="#">Facebook</a></div>
            <div><a href="#">Instagram</a></div>
            <div><a href="#">Twitter</a></div>
            <div><a href="#">Youtube</a></div>          
        </div>
        <div class="useful-link">
            <h3>Let Us Help You</h3>
            <div><a href="#">Shipping Rates & Policies</a></div>
            <div><a href="#">Returns & Replacements</a></div>
            <div><a href="#">Manage Your Content and Devices</a></div>
            <div><a href="#">Help</a></div>
        </div>
        <div class="useful-link">
            <h3>Make Money With Us</h3>
            <div><a href="#">Sell products on RedStore</a></div>
            <div><a href="#">Sell on RedStore Business</a></div>
            <div><a href="#">Advertise Your Products</a></div>
            <div><a href="#">Self-Publish with Us</a></div>
        </div>
    </div>

</body>
<script src="./assets/js/javascript.js"></script>
</html>