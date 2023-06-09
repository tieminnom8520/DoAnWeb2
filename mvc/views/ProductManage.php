<?php
require_once "./mvc/core/basehref.php";
$home_url = getUrl().'/';
if (!$_SESSION['username'] && $_SESSION['username'] == "admin"){
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
                    <div class="option_admin_manage option_select option_selected">
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
                    <div class="option_admin_comment option_select ">
                        <i class="bi bi-exclamation-circle"></i>
                        <a href="manage/note">Chú ý</a>
                    </div>
                </div>

            </div>
            <div class="col-sm-9 menu-right">
                <div class="admin_detail">
                    <div class="admin_detail_title">
                        Quản lý sản phẩm
                    </div>
                    <div class="admin_detail_content">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Loại</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Số Lượng</th>
                                    <th scope="col">Hình Ảnh</th>
                                    <th scope="col">Sửa</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- item -->
                                <?php foreach($data as $value): ?>
                                    <tr data-id="<?=$value['id_mon']?>">
                                        <th scope="row"><?=$value['id_mon']?></th> 
                                        <td class="Name_Product_value"><?php echo substr($value['ten_mon'],0,50)?></td>
                                        <td class="Type_Product_value"><?=$value['Loai']?></td>
                                        <td class="Price_Product_value"><?=$value['gia']?></td>
                                        <td class="Quantity_Product_value"><?=$value['Soluong']?></td>
                                        <td class="Rating_Product_value"><?=$value['Hinhanh']?><a href="products/productdetail/<?=$value["id_mon"]?>">Link</a></td>
                                        <td>
                                            <i class="bi bi-plus-circle-fill detail-product" data-id="<?=$value['id_mon']?>"></i>
                                            <i class="bi bi-gear-fill edit-product" data-id="<?=$value['id_mon']?>--<?=$value['ten_mon']?>--<?=$value['Loai']?>--<?=$value['gia']?>--<?=$value['Soluong']?>--<?=$value['Mota']?>--<?=$value['Hinhanh']?>" data-toggle="modal" data-target="#exampleModalScrollable"></i>
                                            <i class="bi bi-x-circle-fill delete-product" data-toggle="modal" data-target="#exampleModal" data-id="<?=$value['id_mon']?>"></i>
                                            <i class="bi bi-arrow-repeat" data-toggle="modal" data-target="#exampleModalStatus" data-id="<?=$value['id_mon']?>"></i>
                                        </td>
                                        <td class="status"><?=$value['trangthai']?></td>
                                    </tr>
                                    <tr class="hidden_modal" id="<?=$value['id_mon']?>">
                                        <td colspan="8">
                                            <div class="table_payment">
                                                <div class="table_payment_title">Tên</div>
                                            </div>
                                            <div class="table_payment_detail">
                                                <p><?=$value['ten_mon']?></p>
                                            </div>
                                            <div class="table_payment">
                                                <div class="table_payment_title">Mô Tả Chi Tiết</div>
                                            </div>
                                            <div class="table_payment_detail">
                                                <p><?=$value['Mota']?></p>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                
                            </tbody>
                        </table>
                        <div class="show_quantity">
                            <div class="show_quantity_item">
                                <button type="button" id="button_add" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalScrollable">Thêm Sản Phẩm</button>
                            </div>
                            <div class="show_quantity_page">
                                <nav aria-label="...">
                                    <ul class="pagination">
                                      <li class="page-item ">
                                        <a class="page-link" href="manage/viewProductPage/<?=$page - 1?>" tabindex="-1">Trước</a>
                                      </li>
                                      <li class="page-item active">
                                        <a class="page-link" href="manage/viewProductPage/<?=$page?>"><?=$page?></a>
                                      </li>
                                      <li class="page-item">
                                        <a class="page-link" href="manage/viewProductPage/<?=$page + 1?>">Sau</a>
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

            <!-- Status  -->
            <div class="modal fade" id="exampleModalStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalStatusLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalStatusLabel">Status Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Bạn Muốn Ẩn Sản Phẩm ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="status-confirm">Ẩn</button>
            </div>
            </div>
        </div>
        </div>       

        <!-- DELETE Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa</h5>
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
                <h5 class="modal-title" id="exampleModalScrollableTitle">Chỉnh sửa sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_event" method="POST" class="was-validated">
                    <div class="form-group">
                        <label for="Name_Product">Tên</label>
                        <input type="text" class="form-control" id="Name_Product" name="Name_Product" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="Type_Product">Loại</label>
                        <select class="form-control" id="Type_Product" name="Type_Product" required>
                            <option value="" disabled selected hidden>-- Chọn loại sản phẩm --</option>
                            <option value="Cà Phê">Cà Phê</option>
                            <option value="Phindi">Phindi</option>
                            <option value="Trà">Trà</option>
                            <option value="Bánh">Bánh</option>
                            <option value="Khác">Khác</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div id = "price">
                            <label for="Price_ProductS">PriceS</label>
                            <input type="text" class="form-control" id="Price_ProductS" name="Price_ProductS" required>
                            <label for="Price_ProductM">PriceM</label>
                            <input type="text" class="form-control" id="Price_ProductM" name="Price_ProductM" required>
                            <label for="Price_ProductL">PriceL</label>
                            <input type="text" class="form-control" id="Price_ProductL" name="Price_ProductL" required>
                        </div>
                        <div id = "priceN">
                            <label for="Price_ProductN">PriceN</label>
                            <input type="text" class="form-control" id="Price_ProductN" name="Price_ProductN" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Quantity_Product">Số lượng</label>
                        <input type="text" class="form-control" id="Quantity_Product" name="Quantity_Product" required>
                    </div>
                    <div class="form-group">
                        <label for="Detail_Product">Mô tả</label>
                        <input type="text" class="form-control" id="Detail_Product" name="Detail_Product" required>
                    </div>
                    <div class="form-group">
                     <label for="Rating_Product">Hình ảnh</label>
                     <input type="file" class="form-control-file" id="Rating_Product" name="Rating_Product" accept="image/png"  required>
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
    <form method="POST" id="form_delete"></form>
    <form method="POST" id="form_status"></form>

    <script>
            var type1 = document.getElementById("Type_Product");
            var type2 = document.getElementById("price");
            var type3 = document.getElementById("priceN");

            type2.style.display = 'none';
            type3.style.display = 'none';

            type1.onchange = function(){
            if (type1.value === 'Bánh') {
                type2.style.display = 'none';
                type3.style.display = 'block';
            } else {type2.style.display = 'block'
                    type3.style.display = 'none'}
            }
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
                form_delete.action = `manage/deleteProduct/${productId}`;
                form_delete.submit();
            })
        })
        
        //status
        var productId;
        $('#exampleModalStatus').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            productId = button.data('id');
        })
        var getEditRow = Array.from(document.querySelectorAll('#status-confirm'));
        getEditRow.forEach(ele => {
            ele.addEventListener('click', () => {
                var form_status = document.getElementById('form_status');
                form_status.action = `manage/checkProduct/${productId}`;
                form_status.submit();
            })
        })

        //Edit & add event
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
                document.getElementById('Name_Product').value = arr_value[1];
                document.getElementById('Type_Product').value = "";
                document.getElementById('Price_ProductL').value = arr_value[3];
                document.getElementById('Price_ProductN').value = arr_value[3];
                document.getElementById('Quantity_Product').value = arr_value[4];
                document.getElementById('Detail_Product').value = arr_value[5];
                document.getElementById('Rating_Product_value').value = arr_value[6];
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
            if(arr_value) form_event.action = `manage/editProduct/${arr_value[0]}`;
            else form_event.action = `manage/editProduct/-1`
            if(document.getElementById('Type_Product').value != 'Bánh'){
            if(document.getElementById('Name_Product').value&&document.getElementById('Type_Product')&&document.getElementById('Price_ProductS').value&&document.getElementById('Price_ProductM').value&&document.getElementById('Price_ProductL').value&&document.getElementById('Quantity_Product').value&&document.getElementById('Detail_Product').value&&document.getElementById('Rating_Product').value);
            }
            else{if(document.getElementById('Name_Product').value&&document.getElementById('Type_Product')&&document.getElementById('Price_ProductN').value&&document.getElementById('Quantity_Product').value&&document.getElementById('Detail_Product').value&&document.getElementById('Rating_Product').value);
            }
            form_event.submit();
        })
        

    });
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>