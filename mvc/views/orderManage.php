<?php
require_once "./mvc/core/basehref.php";
$home_url = getUrl().'/';
if (!$_SESSION['username'] == "admin"){
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .show_quantity_item{
            margin-top: -5px;
        }
    </style>
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
                <ul><img src="./mvc/image/brand_logo.png" width="200px"></ul>
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
                    <div class="option_admin_comment option_select option_selected">
                        <i class="bi bi-cart-check"></i>
                        <a href="manage/viewOrderPage/1">Quản lý đơn hàng</a>
                    </div>
                    <div class="option_admin_comment option_select ">
                        <i class="bi bi-exclamation-circle"></i>
                        <a href="manage/note">Chú ý</a>
                    </div>
                </div>

            </div>
            <div class="col-sm-9 menu-right">
                <div class="admin_detail">
                    <div class="admin_detail_title">
                        Quản lý đơn hàng
                    </div>
                    <div class="admin_detail_content">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="">ID-Đơn Hàng</th>
                                    <th scope="col">ID-KH</th>
                                    <th scope="col">Tổng Tiền</th>
                                    <th scope="col">Trạng Thái</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- item -->
                                <?php foreach($data as $value): ?>
                                    <tr data-id="<?=$value['id_don_dat']?>">
                                        <th scope="row"><?=$value['id_don_dat']?></th>
                                        <td class="Name_Product_value"><?=$value['id_khachhang']?></td>
                                        <td class="Type_Product_value"><?=$value['tongcong']?></td>
                                        <td class="Price_Product_value"><?=$value['trangthai']?></td>
                                        <td>
                                            <i class="bi bi-plus-circle-fill detail-product" data-toggle="modal" data-target="#exampleModalStatus" data-id="<?=$value['id_don_dat']?>"></i>
                                            <i class="bi bi-x-circle-fill delete-product" data-toggle="modal" data-target="#exampleModal" data-id="<?=$value['id_don_dat']?>"></i>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                
                            </tbody>
                        </table>
                        <div class="show_quantity">
                            <div class="show_quantity_item">
                                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" id="button_add" data-target="#exampleModalScrollable">ADD USER</button> -->
                            </div>
                            <div class="show_quantity_page">
                                <nav aria-label="...">
                                    <ul class="pagination">
                                      <li class="page-item ">
                                        <a class="page-link" href="manage/viewOrderPage/<?=$page - 1?>" tabindex="-1">Prev</a>
                                      </li>
                                      <li class="page-item active">
                                        <a class="page-link" href="manage/viewOrderPage/<?=$page?>"><?=$page?></a>
                                      </li>
                                      <li class="page-item">
                                        <a class="page-link" href="manage/viewOrderPage/<?=$page + 1?>">Next</a>
                                      </li>
                                    </ul>
                                  </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Status  -->
        <div class="modal fade" id="exampleModalStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalStatusLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalStatusLabel">Xác Nhận Đơn Hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Xác Nhận Đơn Hàng ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="status-confirm">Xác Nhận</button>
            </div>
            </div>
        </div>
        </div>   

        <!-- DELETE Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn xóa không?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-danger" id="delete-confirm">Xóa</button>
            </div>
            </div>
        </div>
        </div>

        <!-- EDIT MODAL -->
        <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Chỉnh sửa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_event" method="POST" class="was-validated">
                    <div class="form-group">
                        <label for="Name_User">Name</label>
                        <input type="text" class="form-control" id="Name_User" name="Name_User" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="Password_User">Password</label>
                        <input type="text" class="form-control" id="Password_User" name="Password_User" required>
                    </div>
                    <div class="form-group">
                        <label for="Email_User">Email</label>
                        <input type="text" class="form-control" id="Email_User" name="Email_User" required>
                    </div>
                    <div class="form-group">
                        <label for="Phone_User">Phone</label>
                        <input type="text" class="form-control" id="Phone_User" name="Phone_User" required>
                    </div>
                    <div class="form-group">
                        <label for="Avatar_User">Avatar</label>
                        <input type="text" class="form-control" id="Avatar_User" name="Avatar_User" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="button_form_event">Lưu</button>
            </div>
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
    <form method="POST" id="form_delete"></form>
    <form method="POST" id="form_status"></form>
    <script>
        //show detail
    document.addEventListener('DOMContentLoaded', (event) => {
        var getRows = Array.from(document.querySelectorAll('.detail-product'));
        getRows.forEach(ele => {
            ele.addEventListener('click', () => {
                var dataId = ele.getAttribute('data-id');
                var eleHidden = document.getElementById(dataId);
                eleHidden.classList.toggle('hidden_modal');
            })
        }) 
        // delete event
        var productId;
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            productId = button.data('id');
        })
        
        var getEditRow = Array.from(document.querySelectorAll('#delete-confirm'));
        getEditRow.forEach(ele => {
            ele.addEventListener('click', () => {
                var form_delete = document.getElementById('form_delete');
                form_delete.action = `manage/deleteOrder/${productId}`;
                form_delete.submit();
            })
        })

        //status
        var id_khachhang;
        $('#exampleModalStatus').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            id_khachhang = button.data('id');
        })
        var getEditRow = Array.from(document.querySelectorAll('#status-confirm'));
        getEditRow.forEach(ele => {
            ele.addEventListener('click', () => {
                var form_status = document.getElementById('form_status');
                form_status.action = `manage/checkCart/${id_khachhang}`;
                form_status.submit();
            })
        })
        //Edit event
        $('#exampleModalScrollable').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            productId = button.data('id');
        })
        var arr_value;
        var getRowsEdit = Array.from(document.querySelectorAll('.edit-product'));
        getRowsEdit.forEach(ele => {
            ele.addEventListener('click', () => {
                var dataId = ele.getAttribute('data-id');
                arr_value = dataId.split('--');
                document.getElementById('Name_User').value = arr_value[1];
                document.getElementById('Password_User').value = arr_value[2];
                document.getElementById('Email_User').value = arr_value[3];
                document.getElementById('Phone_User').value = arr_value[4];
                document.getElementById('Avatar_User').value = arr_value[5];

            })
        })
        document.getElementById('button_add').addEventListener('click',()=>{
                document.getElementById('Name_Product').value = '';
                document.getElementById('Type_Product').value = '';
                document.getElementById('Price_Product').value = '';
                document.getElementById('Quantity_Product').value = '';
                document.getElementById('Detail_Product').value = '';
                document.getElementById('Rating_Product').value = '';
        })
        document.getElementById('button_form_event').addEventListener('click', () => {
            var form_event = document.getElementById('form_event');
            if(arr_value) form_event.action = `manage/editUser/${arr_value[0]}`;
            else form_event.action = `manage/editUser/-1`
            if(document.getElementById('Name_User').value&&document.getElementById('Password_User')&&document.getElementById('Email_User').value&&document.getElementById('Phone_User').value)
                form_event.submit();
        })
        

    });
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- <script src="./../assets/js/main.js"></script> -->
</body>

</html>