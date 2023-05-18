<?php
    require_once "./mvc/core/basehref.php";
    $home_url = getUrl().'/';
    if (!$_SESSION['username'] && $_SESSION['username'] = "admin"){
        header("Location: " . geturl(). "/login/loginView");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php
            echo "<base href='${home_url}'>";
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="./assets/css/app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark" >
        <div class="container">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto fontSize">
                    <li class="nav-item active mr-4 selectedMenu">
                        <a class="nav-link" href="./home">Quay Về Trang Chủ</a>
                    </li>
                </ul>
            </div>


        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 menu-left">
                <div class="option_admin">
                    <div class="option_admin_title">
                        <span>Tùy chọn</span>
                        <i class="bi bi-caret-down-fill"></i>
                    </div>
                    <div class="option_admin_manage option_select ">
                        <i class="bi bi-list-check"></i>
                        <a href="manage/viewProductPage/1">Quản lý sản phẩm</a>
                        
                    </div>
                    <div class="option_admin_comment option_select ">
                        <i class="bi bi-person-circle"></i>
                        <a href="manage/viewUserPage/1">Quản lý người dùng</a>
                    </div>
                    <div class="option_admin_comment option_select ">
                        <i class="bi bi-cart-check"></i>
                        <a href="manage/viewOrderPage/1">Quản lý đơn hàng</a>
                    </div>
                    <div class="option_admin_comment option_select option_selected">
                        <i class="bi bi-exclamation-circle"></i>
                        <a href="manage/note">Chú ý</a>
                    </div>
                </div>

            </div>
            <div class="col-sm-9 menu-right">
                <div class="admin_detail">
                    <div class="admin_detail_title">
                        Chú ý
                    </div>
                    <div class="admin_detail_content">
                        <div class="admin_detail_note">
                            <p>Với những admin chuyên chăm sóc mảng website, công việc một ngày của họ thường sẽ phải làm những nhiệm vụ như:

                               <br> Quản lí, tạo lập tài khoản người dùng: Tùy vào quy mô hoạt động của doanh nghiệp, các quản trị viên website sẽ trực tiếp tạo lập tài khoản, quản lí tài khoản người dùng. Cũng như là quản lí lượt người truy cập nhằm phát hiện, ngăn chặn các hành vi có hại cho website
                               <br> Theo dõi, bảo mật website: Các admin website thường phải theo dõi lượng truy cập của web trong từng ngày, từng giờ. Đồng thời sử dụng các phần mềm hỗ trợ để phát hiện và khắc phục các sự cố của website một các nhanh chóng
                               <br> Cấu hình, quản lí các công cụ trực tuyến khác nhau: Các admin website của lĩnh vực nào thì cũng cần phải đảm nhận công việc quản lí, cấu hình các công cụ cần thiết nhằm phân tích rõ lưu lượng đăng nhập, lượt tương tác với web từ phía người dùng. Đặc biệt, ở nhiều công ty lớn, các quản trị viên web còn tự mình tạo dựng các chương trình để tự động phân tích những yếu tố này.
                                </p>
                        </div>
                        <div class="show_quantity">
                            <div class="show_quantity_item">
                                Email: baodangvui@gmail.com
                            </div>
                            <div class="show_quantity_page">
                                <nav aria-label="...">
                                    <ul class="pagination">
                                      <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Prev</a>
                                      </li>
                                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                                      <li class="page-item active">
                                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                      </li>
                                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                                      <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                      </li>
                                    </ul>
                                  </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

    <script src="main.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>