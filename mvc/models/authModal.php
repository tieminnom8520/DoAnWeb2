<?php
require_once "./mvc/core/basehref.php";
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
    public function generateId(){
        $typesql = "SELECT * FROM taikhoan";
        $query1 = $this->_query($typesql);
        $danh_sach_tai_khoan = [];
        while ($row = mysqli_fetch_assoc($query1)) {
            array_push($danh_sach_tai_khoan, $row);
        }
        $id_num = count($danh_sach_tai_khoan)+1;
        $id = "KH".$id_num;
        return $id;
    }
    public function authRegister($ten,$password, $email,$sdt){
        $password = password_hash($password, PASSWORD_DEFAULT);
        if(!($ten&&$password&& $email&&$sdt)) return "<script>
            alert('Thông tin nhập thiếu. Mời nhập lại');
            location.href = '".geturl()."/login/registerView';
        </script>";
        $id = $this->generateId();
        $typesql1 = "insert into taikhoan (id_taikhoan,ten,	password,	email,	sdt)
        values ('".$id."','".$ten."', '".$password."', '".$email."', '".$sdt."');";
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