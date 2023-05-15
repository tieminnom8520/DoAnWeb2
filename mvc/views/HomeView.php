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
    <title>Home Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
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
                    <li><a style="background-color: dodgerblue;" href="#">Home</a></li>
                    <li><a href="products">Products</a></li>
                    <li><a href="cart"><img style="width:20px;padding:0px;" src="https://www.freeiconspng.com/thumbs/cart-icon/basket-cart-icon-27.png"></a></li>
                    
                    <?php if($_SESSION['username'] == 1) echo "<li><a href=\"manage/viewProductPage/1\">Admin</a></li><li><a href=\"login/logout\">Logout</a></li>";
                    else echo "<li><a href=\"login/logout\">Logout</a></li>";?>
                </ul>
            </nav>
        </div>
    </div>

    <div class="intro">
        <div class="intro-desc">
            <h1>GIVE YOUR WORKOUT<br>A NEW STYLE!</h1>
            <p>Success isn't always about greatness.
                It's about consistency. Consistent
                hard work gains success. Greatness will come.
            </p>
            <div class="explore-btn"><a href ="products">Explore Now!</a></div>
        </div>

        <div class="intro-image">
        </div>
    </div>
    
    <div class="ads">
        <img src="https://images-na.ssl-images-amazon.com/images/G/01/AmazonExports/Fuji/2020/May/Dashboard/Fuji_Dash_Deals_1x._SY304_CB430401028_.jpg" alt="#" style="border-radius: 50px 0 0 50px;">
        <img src="https://images-na.ssl-images-amazon.com/images/G/01/AmazonExports/Fuji/2020/May/Dashboard/Fuji_Dash_PC_1x._SY304_CB431800965_.jpg" alt="#">
        <img src="https://images-na.ssl-images-amazon.com/images/G/01/AmazonExports/Fuji/2020/May/Dashboard/Fuji_Dash_HomeBedding_Single_Cat_1x._SY304_CB418596953_.jpg" alt="#" style="border-radius: 0 50px 50px 0;">
    </div>
    <div class="category-list">

        <?php foreach ($data["all-type"] as $value): ?>
            <div class="category-box">
                <h2><?=$value["Loai"]?></h2>
                <div class="product-list">
                    <?php 
                    $pro_of_type = $data["pro-db"]->getAllProductsOfCategory($value["Loai"]);
                    $i = 0;
                    foreach ($pro_of_type as $pro):
                        $i++;
                    ?>
                        <div class="product">
                            <a href="products/productdetail/<?=$pro["id_mon"]?>"><img src=' ./mvc/image/<?php echo $pro["Hinhanh"] ?>' alt="#"></a>
                            <p><?=substr($pro["ten_mon"], 0, 50)?></p>
                        </div>
                    
                    <?php 
                        if ($i > 3) break;
                        endforeach; ?>
                </div>
                <div class="seemore-btn"><a href="products/category/<?=$value["Loai"]?>">See more</a></div>
            </div>
        <?php endforeach; ?>

        <div class="category-scroll">
            <h2>May be you need</h2>
            <div class="product-list">
                <?php 
                    while ($row = mysqli_fetch_array($data["all-pro"])){
                        echo '<div class="product">
                                <a href="products/productdetail/'.$row["id_mon"].'"><img src="./mvc/image/'.$row["Hinhanh"].'" alt="#"></a>
                            </div>';
                    };
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