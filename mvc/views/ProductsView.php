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
        <?php include "./assets/css/product.css" ?>
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
                    <li><a style="background-color: dodgerblue;" href="products">Products</a></li>
                    <li><a href="cart"><img style="width:20px;padding:0px;" src="https://www.freeiconspng.com/thumbs/cart-icon/basket-cart-icon-27.png"></a></li>
                    <?php if($_SESSION['username'] = "1") echo "<li><a href=\"manage/viewProductPage/1\">Admin</a></li><li><a href=\"login/logout\">Logout</a></li>";
                    else echo "<li><a href=\"login/logout\">Logout</a></li>";?>
                </ul>
            </nav>
        </div>
    </div>

    <div class="products">
        <div class="type-menu">
            <div class="sub-menu">
                <div class="menu-title">Departments</div> 
                <?php 
                    while ($row = mysqli_fetch_array($data["all-type"])){
                        echo '
                        <div class="department" id="'.$row["Loai"].'">
                            <a href="./products/category/'.$row["Loai"].'" ">'
                                .$row["Loai"].'
                            </a>
                        </div>';
                    };
                ?>
                
            </div>

            <div class="sub-menu">
                <div class="menu-title">Price</div>
                <div class="department"><a href="products/price/0/25">Under $25</a></div>
                <div class="department"><a href="products/price/25/50">$25 to $50</a></div>
                <div class="department"><a href="products/price/50/100">$50 to $100</a></div>
                <div class="department"><a href="products/price/100/200">$100 to $200</a></div>
                <div class="department"><a href="products/price/200/100000">$200 & Above</a></div>
            </div>

        </div>

        <div class="type-product">
            <div class="title">
                <div class="topic">
                    <?php 
                        if (array_key_exists("type", $data)) echo $data["type"];
                        else if (array_key_exists("price", $data)) echo $data["price"];
                        else if (array_key_exists("search", $data)) echo "Result for '".$data["search"]."'";
                        else echo "All Products";
                    ?>
                </div>
                <div class="search-box">
                    <input id="search-form" type="text" placeholder="Search" onchange="changeUrl()">
                    <a id="search-btn" href="#"><img style="height:16px;margin:10px;" src="http://assets.stickpng.com/images/585e4ad1cb11b227491c3391.png"></a>
                </div>
            </div>
            <div class="product-list">
                <?php 
                    while ($row = mysqli_fetch_assoc($data["all-pro"])){
                        echo '<div class="product">
                                <a href="products/productdetail/'.$row["id_mon"].'"><div class="product-img"><img src="./mvc/image/'.$row["Hinhanh"].'" alt="#"></div></a>
                                <div class="product-price">'.$row["gia"].'$</div>
                                <div class="product-name">'.$row["ten_mon"].'</div>
                            </div>';
                    };
                ?>
            </div>
        </div>
    </div>

    <div class="page-btn">
        <a href=""></a>
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
<script>
    function changeUrl(){
        var searchValue = document.getElementById("search-form").value;
        document.getElementById("search-btn").href = "products/search/"+searchValue;
    }
</script>
</html>