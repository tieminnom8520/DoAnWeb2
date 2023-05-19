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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
                    <li><a style="background-color: dodgerblue;" href="#"><img style="width:20px;padding:0px;" src="https://www.freeiconspng.com/thumbs/cart-icon/basket-cart-icon-27.png"></a></li>
                    <?php if($_SESSION['username'] == "admin") echo "<li><a href=\"manage/viewProductPage/1\">Admin</a></li><li><a href=\"login/logout\">Logout</a></li>";
                    else echo "<li><a href=\"login/logout\">Logout</a></li>";?>
                </ul>
            </nav>
        </div>
    </div>

    <div class="cart">
        <div class="cart-header">
            <h2>Giỏ hàng của bạn<img style="width:20px;padding:0px;margin-left:10px" src="https://www.freeiconspng.com/thumbs/cart-icon/basket-cart-icon-27.png"></h2>
            <button data-toggle="modal" data-target="#thanhtoan-form">Thanh toán</button>
        </div>
        <div class="order-list">
            <?php 
                // $order_no = 0;
                // foreach($data["all-order"] as $order): 
                // $order_no++;
                $connect = mysqli_connect("localhost", "root", "");
                mysqli_select_db($connect, "coffeeshop");
                $order_no = 0;
                $tongtien = 0;
                // echo "<script>console.log(".count($_SESSION["cart"]).")</script>" ;
                foreach ($_SESSION["cart"]  as $session_cart):
                    echo "<script>console.log(".$session_cart[0].")</script>" ;
                    $qr = "select m.*, ct_m_s.gia 
                            from MON as m join ct_mon_size as ct_m_s on m.id_mon = ct_m_s.id_mon 
                            where m.id_mon = '".$session_cart[0]."' 
                            and ct_m_s.id_size = '".$session_cart[1]."'";
                    foreach(mysqli_query($connect, $qr) as $order):
                        $thanhtien = (int) ($session_cart[2]) * ($order["gia"]);
                        $tongtien += $thanhtien;
                        $order_no++;
            ?>
            <div class="order">
                <div class="order-number"><p><?=$order_no?></p></div>
                <div class="order-img"><img src="<?="./mvc/image/".$order["Hinhanh"]?>"></div>
                <div class="order-infor"> 
                    <div class="">
                        <div class="name">
                            <?=$order["ten_mon"]?>
                        </div>
                        <div class="detail">
                            <div class="attribute"> 
                               Giá: 
                                <div class="value" id="cost"><?=$order["gia"]?>₫</div>
                            </div>
                            <div class="attribute"> 
                                Loại: 
                                <div class="value"><?=$order["Loai"]?></div>
                            </div>
                            <div class="attribute"> 
                               Số lượng: 
                                <div class="value" id="quantity"><?=$session_cart[2]?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="total">
                    Tổng tiền : <span  style="color : #ff4d52; font-size : 20px;">
                                    <?= (int)($session_cart[2])*(int)($order["gia"]) ?>₫
                    </span>

                </div>
            </div>
                        <?php endforeach;
                
            endforeach;?>
            
        </div>
    </div>
        
    <!-- EDIT MODAL -->
    <div class="modal fade" id="thanhtoan-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Chỉnh sửa sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_event" method="POST" class="was-validated">
                    <div class="form-group">
                        <label for="Name_Product">Tên</label>
                        <input type="text" class="form-control" id="Name_Product" name="ten_thanhtoan" required>
                    </div>
                    <div class="form-group">
                        <label for="Quantity_Product">Địa chỉ</label>
                        <input type="text" class="form-control" id="Quantity_Product" name="diachi_thanhtoan" required>
                    </div>
                    <div class="form-group">
                        <label for="Quantity_Product">Số điện thoại</label>
                        <input type="text" class="form-control" id="Quantity_Product" name="sodienthoai_thanhtoan" required>
                    </div>
                    <div class="form-group">
                        <label for="Detail_Product">Ghi chú</label>
                        <input type="text" class="form-control" id="Detail_Product" name="ghichu_thanhtoan" required>
                    </div>
                    <div></div>
                    <div class="form-group">
                        <label for="Detail_Product">Tổng tiền:</label>
                        <label id="tongtien" name="tongtien_thanhtoan"><?= $tongtien ?>₫ </label>
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="cart-confirm" >Thanh toán</button>
            </div>
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
<script src="./assets/js/javascript.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>