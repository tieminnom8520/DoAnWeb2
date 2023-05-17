<?php
require_once "./mvc/core/basehref.php";

//Kiểm tra và khởi tạo giá trị của biến $_SESSION['id_num']
if (!isset($_SESSION['id_num'])) {
    $_SESSION['id_num'] = 2;
}
// unset($_SESSION['id_num']);
class authModal extends db{
    private function _query($sql)
    {
        return mysqli_query($this->connect, $sql);
    }
    public function authLogin($email,$password){
        $typesql = "SELECT * FROM taikhoan WHERE email='".$email."';";
        $query1 = $this->_query($typesql);
        if(!$query1) return [];
        $types = [];
        while ($row = mysqli_fetch_assoc($query1)) {
            array_push($types, $row);
        }
        $pwDB = $types[0]["password"];
        echo "<script type='text/javascript'>alert('$pwDB - $password');</script>";
        if(password_verify($password,$pwDB)) {
            echo "<script type='text/javascript'>alert('True');</script>";
           return $types;
        }else{
            return [];
        }     
    } 

    public function authRegister($ten,$password, $email,$sdt , $address){
        $password = password_hash($password, PASSWORD_DEFAULT);
        if(!($ten&&$password&& $email&&$sdt &&$address)) return "<script>
            alert('Thông tin nhập thiếu. Mời nhập lại');
            location.href = '".geturl()."/login/registerView';
        </script>";
        $id = "KH" . $_SESSION['id_num'];
        $_SESSION['id_num']++;

        $typesql1 = "insert into taikhoan (id_taikhoan, ten, password,	email,	sdt, diachi)
        values ('".$id."','".$ten."', '".$password."', '".$email."', '".$sdt."', '".$address."');";
        if (!$this->_query($typesql1)) {
            return "<script>
                alert('Thông tin nhập thiếu. Mời nhập lại');
                location.href = '".geturl()."/login/registerView';
            </script>";
        }
        return "";
    }

}
?>