<?php
    require_once "./mvc/core/basehref.php";
    Class Login extends Controller {
        public function loginView(){
            $this->view("loginView");
        }
        public function auth(){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $demoData = $this->model('authModal')->authLogin($email,$password);
            
            if(!$demoData) echo "<script>
                alert('Thông tin đăng nhập sai. Mời nhập lại');
                location.href = '".geturl()."/login/loginView';
            </script>";
            else {
                $_SESSION['username'] = $demoData[0]['chucvu'];
                $_SESSION['ten'] = $demoData[0]['ten'];
                header("Location: " . geturl(). "/home");
            }
        }
        public function registerView(){
            $this->view("registerView");
        }
        public function register(){
            $ten = $_POST['ten'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $sdt = $_POST['sdt'];
            $address = $_POST['address'];
            $demoData = $this->model('authModal')->authRegister($ten,$password, $email,$sdt, $address);
            if($demoData != "") echo $demoData;
            else header("Location: " . geturl(). "/login/loginView");
        }
        public function logout(){
            unset($_SESSION['username']);
            unset($_SESSION['ten']);
            header("Location: " . geturl(). "/login/loginView");
        }

    }
?>