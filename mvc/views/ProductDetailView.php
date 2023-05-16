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
        <?php include "./assets/css/detail.css" ?>
        <?php include "./assets/css/home.css" ?>
    </style>

    <script>
        function getTotalCost(){
            var curQuantity = Number(document.getElementById("buy-quantity").value);
            var productCost = document.getElementById("cost").innerHTML;
            productCost = Number(productCost.substring(0, productCost.length-1));
            document.getElementById("total-cost").innerHTML = productCost*curQuantity + "$";
        }
    </script>
    
</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="home"><img src="https://lh3.googleusercontent.com/d/1Rc3H-oqkp8BIRXpcL_EOUMlBeNf5CSll" alt=""></a>
        </div>
        <div>
            <nav class="menu">
                <ul>
                    <li><a href="home">Home</a></li>
                    <li><a style="background-color: dodgerblue;" href="products">Products</a></li>
                    <li><a href="cart"><img style="width:20px;padding:0px;" src="https://www.freeiconspng.com/thumbs/cart-icon/basket-cart-icon-27.png"></a></li>
                    <?php if($_SESSION['username'] = "1") echo "<li><a href=\"manage/viewProductPage/1\">Admin</a></li><li><a href=\"login/logout\">Logout</a></li>";
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
                        Price: 
                        <div class="value" id="cost"><?php echo $data["pro"]["gia"] ?>$</div>
                    </div>
                    <div class="attribute"> 
                        Category: 
                        <div class="value"><?php echo $data["pro"]["Loai"] ?></div>
                    </div>
                    <div class="attribute"> 
                        Quantity: 
                        <div class="value" id="quantity"><?php echo $data["pro"]["Soluong"] ?></div>
                    </div>
                </div>
                
                <div class="desc">
                    <h4>About this item</h4>
                    <?php echo $data["pro"]["Mota"] ?>
                </div>
            </div>

            <div class="order-form">
                <div class="name">Order</div>
                <div>
                    <form id="order-form" method="POST" action="payment/addToCart">
                        <div class="order-infor" style="display: none;">
                            <input type="text" name="user_taikhoan" value="<?php echo $_SESSION['username']?>">
                        </div>
                        <div class="order-infor" style="display: none;">
                            <input type="text" name="id_mon" value="<?php echo $data["pro"]["id_mon"]?>">
                        </div>
                        <div class="order-infor">
                            <label>Quantity:</label><input name="quantity" type="number" id="buy-quantity" min="1" max="<?php echo $data["pro"]["Soluong"] ?>" value="1" onchange="getTotalCost()">
                        </div>
                            
                        <div class="order-infor">
                            <label>Deliver to:</label>
                            <select id="country" name="country">
                                <option value="Afganistan">Afghanistan</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Armenia">Armenia</option>
                            </select>
                        </div>

                        <div class="order-infor">
                            <label>Total:</label><label id="total-cost"><?php echo $data["pro"]["gia"] ?>$</label>
                        </div>

                        <div id="add-to-cart-btn">
                            <button type="submit">Add to Cart</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="related-product">
            <h2>Products related to this item</h2>
            <div class="product-list">
                <?php 
                    while ($row = mysqli_fetch_assoc($data["related-pro"])){
                        echo '<div class="product">
                                <a href="products/productdetail/'.$row["id_mon"].'"><div class="img"><div><img src="./mvc/image/'.$row["Hinhanh"].'" alt="#"></div></div></a>
                                <h3>'.$row["gia"].'$</h3>
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

</html>