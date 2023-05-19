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
    <title>Trang Sản Phẩm</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        <?php include "./assets/css/detail.css" ?>
        <?php include "./assets/css/home.css" ?>
    </style>

    <script>
        function getTotalCost(){
            var curQuantity = Number(document.getElementById("buy-quantity").value);
            var productCost = document.getElementById("cost").innerHTML;
            productCost = Number(productCost.substring(0, productCost.length-1));
            document.getElementById("total-cost").innerHTML = productCost*curQuantity + "₫";
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="home"><img src="./mvc/image/brand_logo.png" alt="#" id="brand_logo"></a>
        </div>
        <div>
            <nav class="menu">
                <ul>
                    <li><a href="home">Trang Chủ</a></li>
                    <li><a style="background-color: #ffd452;color :black;" href="products">Sản Phẩm</a></li>
                    <li><a href="cart"><img style="width:20px;padding:0px;" src="https://www.freeiconspng.com/thumbs/cart-icon/basket-cart-icon-27.png"></a></li>
                    <?php if($_SESSION['username'] == "admin") echo "<li><a href=\"manage/viewProductPage/1\">Admin</a></li><li><a href=\"login/logout\">Logout</a></li>";
                    else echo "<li><a href=\"login/logout\">Logout</a></li>";?>
                </ul>
            </nav>
        </div>
    </div>

    <div class="content">
        <div class="product-detail">
            <div class="image">
            <img src=' ./mvc/image/<?php echo $pro["Hinhanh"] ?>' alt="#">
            </div>
            <div class="infor">
                <div class="name">
                    <?php echo $data["pro"]["ten_mon"] ?>
                </div>
                <div class="detail">
                    <div class="attribute"> 
                        Giá : 
                        <div class="value" id="cost"><?php echo $data["pro"]["gia"] ?>₫</div>
                    </div>
                    <div class="attribute"> 
                        Loại : 
                        <div class="value"><?php echo $data["pro"]["Loai"] ?></div>
                    </div>
                    <div class="attribute"> 
                        Số Lượng Còn Lại : 
                        <div class="value" id="quantity"><?php echo $data["pro"]["Soluong"] ?></div>
                    <?php if ($pro['Loai'] !== "Bánh"): ?>
                    </div>
                    </div>
                    <div class="attribute">
                    <label for="Size_Product">Size&nbsp;&nbsp;&nbsp;</label>
                    <div class="radio-group">
                        <button onclick="location.href='products/productdetail/<?php echo $pro['id_mon']; ?>/S'">S</button>
                        <button onclick="location.href='products/productdetail/<?php echo $pro['id_mon']; ?>/M'">M</button>
                        <button onclick="location.href='products/productdetail/<?php echo $pro['id_mon']; ?>/L'">L</button>
                    <?php endif; ?>
                    </div>
                </div>
                <div class="desc">
                    <h4>Thông Tin Thêm</h4>
                    <br>
                    <mota>
                    <?php echo $data["pro"]["Mota"] ?>
                    </mota>
                </div>
            </div>

            <div class="order-form">
                <div class="name">Đặt Hàng</div>
                <div>
                    <form id="order-form" method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                        <div class="order-infor" style="display: none;">
                            <input type="text" name="user_taikhoan" value="<?php echo $_SESSION['username']?>">
                        </div>
                        <div class="order-infor" style="display: none;">
                            <input type="text" name="id_mon" value="<?php echo $data["pro"]["id_mon"]?>">
                        </div>
                        <div class="order-infor">
                            <label>Số Lượng:</label><input name="quantity" type="number" id="buy-quantity" min="1" max="<?php echo $data["pro"]["Soluong"] ?>" value="1" onchange="getTotalCost()">
                        </div>
                            
                        <!-- <div class="order-infor">
                            <label>Địa Chỉ Giao Hàng:</label>
                            <select id="country" name="country">
                                <option value="Afganistan">Afghanistan</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Armenia">Armenia</option>
                            </select>
                        </div> -->

                        <div class="order-infor">
                            <label>Tổng Cộng :</label><label id="total-cost"><?php echo $data["pro"]["gia"] ?>₫</label>
                        </div>

                        <div id="add-to-cart-btn">
                            <button type="submit" >Thêm Vào Giỏ Hàng</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>


        <div class="related-product">
            <h2>Các Sản Phẩm Liên Quan</h2>
            <div class="product-list">
                <?php 
                    while ($row = mysqli_fetch_assoc($data["related-pro"])){
                        echo '<div class="product">
                                <a href="products/productdetail/'.$row["id_mon"].'/S">
                                    <div class="img">
                                        <div>
                                            <img src="./mvc/image/'.$row["Hinhanh"].'" alt="#">
                                        </div>
                                        <div class="gradient">
                                           
                                        </div>
                                        <h1>Chi tiết</h1>
                                    </div>
                                </a>
                                <h3>'.$row["gia"].'₫</h3>
                                <div class="name">'.$row["ten_mon"].'</div>
                            </div>';
                    }
                ?>
            </div>
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
<?php 
    if($_POST['quantity']){
        $_SESSION['quantity'] = $_POST['quantity'];
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = array();
        }else{
            $currentUrl = $_SERVER['REQUEST_URI'];
            $urlParts = explode('/', $currentUrl);
            $lastPart = end($urlParts);
            $found = 0;
            for($i = 0; $i < count($_SESSION['cart']); $i++){
                if($_SESSION['cart'][$i][0] == $data["pro"]["id_mon"] && $_SESSION['cart'][$i][1] ==$lastPart){
                    $found = 0;
                    $new_quantity = (string)((int)$_SESSION['quantity'] + (int)$_SESSION['cart'][$i][2]);
                    $_SESSION['cart'][$i]= array($data["pro"]["id_mon"],$lastPart,$new_quantity);
                    $found = 1;
                }
            }
            if($found == 0){
                $cart_item = array($data["pro"]["id_mon"],$lastPart,$_SESSION['quantity']);
                $_SESSION['cart'][] = $cart_item;
            }
            // echo "<script> alert(".$found."); </script>";
            // $cart_item2 = json_encode($cart_item);
            // echo "<script> console.log(".$cart_item2."); </script>";
            $session_cart = json_encode($_SESSION['cart']);
            echo "<script> console.log(".$session_cart."); </script>";
            
        }
        unset($_SESSION['quantity']);
    }
?>
</html>