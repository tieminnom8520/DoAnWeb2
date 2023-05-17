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
    <title>Trang Chủ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        <?php include "./assets/css/home.css" ?>
    </style>
    <link rel="stylesheet" href="./assets/css/banner.css">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
      />
      <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">

</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="./home"><img src="./mvc/image/brand_logo.png" alt="#" id="brand_logo"></a>
        </div>
        <div>
            <nav class="menu">
                <ul>
                    <li><a style="background-color:  #ffd452; color :black;" href="#">Trang Chủ</a></li>
                    <li><a href="products">Sản Phẩm</a></li>
                    <li><a href="cart"><img style="width:20px;padding:0px;" src="https://www.freeiconspng.com/thumbs/cart-icon/basket-cart-icon-27.png"></a></li>
                    
                    <?php if($_SESSION['username'] == "admin") echo "<li><a href=\"manage/viewProductPage/1\">Admin</a></li><li><a href=\"login/logout\">Đăng Xuất</a></li>";
                    else echo "<li><a href=\"login/logout\">Logout</a></li>";?>
                </ul>
            </nav>
        </div>
    </div>

    <a href="#" alt="banner1-Trà dưa hấu vải">
        <div class="banner_box">
           <img src="./mvc/image/banner/banner_1/banner.png" class="banner">
            <img src="./mvc/image/banner/banner_1/banner_ob_1.png" class="banner_object" id="object_1">
            <img src="./mvc/image/banner/banner_1/banner_ob_2.png" class="banner_object" id="object_2">
            <img src="./mvc/image/banner/banner_1/banner_ob_3.png" class="banner_object" id="object_3">
            <img src="./mvc/image/banner/banner_1/banner_ob_4.png" class="banner_object" id="object_4">
            <img src="./mvc/image/banner/banner_1/banner_ob_5.png" class="banner_object" id="object_5">
            <img src="./mvc/image/banner/banner_1/banner_ob_6.png" class="banner_object" id="object_6">
        </div>
    </a>
    
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
                <div class="seemore-btn"><a href="products/category/<?=$value["Loai"]?>">Xem Thêm</a></div>
            </div>
        <?php endforeach; ?>

        <div class="category-scroll">
            <h2>Có Thể Bạn Sẽ Thích</h2>
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
            <h3>Tìm Hiểu Thêm Về Chúng Tôi</h3>
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