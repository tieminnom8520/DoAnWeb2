<?php
    require_once "./mvc/core/basehref.php";
    $home_url = getUrl().'/';
    if (!$_SESSION['username']){
        header("Location: " . geturl(). "/login/loginView");
    }
    if (!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
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
                    <?php if($_SESSION['username'] == "admin") echo "<li><a href=\"manage/viewProductPage/1\">Xin Chào <b>{$_SESSION['ten']}</b></a></li><li><a href=\"login/logout\">Đăng Xuất</a></li>";
                    else echo "<li><a>Xin Chào <b>{$_SESSION['ten']}</b></a></li><li><a href=\"login/logout\">Logout</a></li>";?>
                </ul>
            </nav>
        </div>
    </div>

    <a href="products/productdetail/38" alt="banner1-Trà dưa hấu vải">
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
    <a href="products/category/Bánh" ><div class="banner_box" id="banner2">
        <div class="banner"></div>
        <img src="./mvc/image/banner/banner_2/bn_object_1.png" class="banner_object" id="object_7">
        <img src="./mvc/image/banner/banner_2/bn_object_2.png" class="banner_object" id="object_8">
        <div style="font-size:100px; color : black;" class="banner_object" id="BanhNgot"> BÁNH NGỌT</div>
        <div style="font-size:25px; font-weight:900; color : black;" class="banner_object" id="BanhNgotChiTiet"> Với sự kết hợp giữa chất lượng, 
        hương vị đặc trưng và sự đổi mới, bánh của Lowland đã trở thành một sự lựa chọn ưa thích. 
        Lowland luôn mang đến niềm vui và sự hài lòng trong mỗi miếng bánh,
         tạo nên những kỷ niệm ngọt ngào và hạnh phúc cho tất cả khách hàng.</div>
    </div></a>
    
    <div class="category-list">


        <div class="category-scroll">
            <h1>Các sản phẩm nổi bật</h1>
            <div class="product-list">
                <?php 
                    while ($row = mysqli_fetch_array($data["all-special"])){
                        echo '<div class="product">
                                <a href="products/productdetail/'.$row["id_mon"].'"><img src="./mvc/image/'.$row["Hinhanh"].'" alt="#">
                                <div class="ct">Chi Tiết</div>
                                </a>
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
            <h3>Để chúng tôi giúp bạn</h3>
            <div><a href="#">Chính Sách giao hàng</a></div>
            <div><a href="#">Khiếu Nại Và Bồi Thường </a></div>
            <div><a href="#">Quản lý nội dùng và thiết bị</a></div>
            <div><a href="#">Trợ giúp</a></div>
        </div>
        <div class="useful-link">
            <h3>Tuyển dụng</h3>
            <div><a href="#">Cộng tác viên Facebook</a></div>
            <div><a href="#">Cộng tác viên TikTok</a></div>
            <div><a href="#">Liên hệ Quảng cáo</a></div>
            <div><a href="#">Liên hệ nhượng quyền</a></div>
        </div>
    </div>

</body>
</html>