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
        <?php include "./assets/css/product.css" ?>
        <?php include "./assets/css/home.css" ?>
    </style>
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
        <div class="search-box">
                    <input id="search-form" type="text" placeholder="Trà thạch vải..." onchange="changeUrl()">
                    <a id="search-btn" href="#"><i class="fas fa-search fa-2x" ></i></a>
        </div>
        <div>
            <nav class="menu">
                <ul>
                    <li><a href="./home">Trang Chủ</a></li>
                    <li><a style="background-color:  #ffd452; color : black;" href="products">Sản Phẩm</a></li>
                    <li><a href="cart"><img style="width:20px;padding:0px;" src="https://www.freeiconspng.com/thumbs/cart-icon/basket-cart-icon-27.png"></a></li>
                    <?php if($_SESSION['username'] = "admin") echo "<li><a href=\"manage/viewProductPage/1\">Admin</a></li><li><a href=\"login/logout\">Logout</a></li>";
                    else echo "<li><a href=\"login/logout\">Logout</a></li>";?>
                </ul>
            </nav>
        </div>
    </div>

    <div class="products">
        <div class="type-menu"> 
            <h1 style="color: #9ec7a7;">Bộ lọc tìm kiếm</h1>
            <div class="sub-menu">
                <div class="menu-title">Danh Mục Sản Phẩm</div> 
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
                        else if (array_key_exists("search", $data)) echo "Kết quả tìm kiếm cho <search style='color : #ffd452;'>'".$data["search"]."'</search>";
                        else echo "Tất cả sản phẩm";
                    ?>
                </div>
            </div>
            <div class="product-list">
                <?php 
                    while ($row = mysqli_fetch_assoc($data["all-pro"])){
                        echo '<div class="product">
                                <a href="products/productdetail/'.$row["id_mon"].'"><div class="product-img"><img src="./mvc/image/'.$row["Hinhanh"].'" alt="#"></div></a>
                                <div class="product-price">'.$row["gia"].'₫</div>
                                <div class="product-name">'.$row["ten_mon"].'</div>
                                <a href="products/productdetail/'.$row["id_mon"].'"><div class="product-ct">Click để xem chi tiết</div></a>
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
<script src="./assets/js/javascript.js"></script>
<script>
    function changeUrl(){
        var searchValue = document.getElementById("search-form").value;
        document.getElementById("search-btn").href = "products/search/"+searchValue;
    }
</script>
</html>