<?php
    require_once "./mvc/core/basehref.php";
    $home_url = getUrl().'/';
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


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/app.css">
    
</head>
<body>
<script>
  function revealPass(){
    let reveal = document.getElementById("password").type;
    if(reveal == "password"){
      document.getElementById("password").type = "text";
      document.getElementById("reveal-pass").innerHTML = "<i class='fa fa-eye-slash'></i>";
      document.getElementById("reveal-pass").title = "ẩn mật khẩu";
    }
    else{
      document.getElementById("password").type = "password";
      document.getElementById("reveal-pass").innerHTML = "<i class='fa fa-eye'></i>";
      document.getElementById("reveal-pass").title = "hiện mật khẩu";
    }
  }
</script>
<div class="main">
    <form method="POST" class="form" id="form-1" action="login/register">

      <!--
      <p class="desc">Connect to our shop</p> -->
      <!-- <div class="spacer"></div> -->
      <div class="login_logo"><img src="./mvc/image/brand_logo.png" width='250px'></div>
      <h4 class="heading">Đăng Ký Tài Khoản Mới</h4>
      <div class="form-group">
        <label for="fullname" class="form-label">Tên Đầy Đủ</label>
        <input id="fullname" name="ten" type="text" placeholder="Ex: Nguyen Van A" class="form-control">
        <span class="form-message"></span>
      </div>

      <div class="form-group">
        <label for="phonenumber" class="form-label">Số Điện Thoại</label>
        <input id="phonenumber" name="sdt" type="number" placeholder="Ex: 0969696969" class="form-control">
        <span class="form-message"></span>
      </div>
      
      <div class="form-group">
        <label for="email" class="form-label">Email</label>
        <input id="email" name="email" type="email" placeholder="Ex: email@domain.com" class="form-control">
        <span class="form-message"></span>
      </div>

      <div class="form-group">
        <label for="password" class="form-label">Mật Khẩu</label>
        <div class="password_field" style="display:flex;">
              <input id="password" name="password" type="password" placeholder="Enter password..." class="form-control"
                required>
              <button id="reveal-pass" type="button" title="hiện mật khẩu" onclick="revealPass();">
                <i class='fa fa-eye'></i>
              </button>
            </div>
        <span class="form-message"></span>
      </div>
      <a href="login/loginView" class='desc'>Bạn đã có tài khoản. Click để đăng nhập</a>
      <button class="form-submit" type="submit">Đăng Ký</button>
    </form>
</div>

<style>
* {
  -webkit-box-sizing: inherit;
  box-sizing: inherit; }

:root{
    --text-color: #9a9a9a;
    --white-color: #fff;
    --purple-color:#ba71da;
    --border-color:#f1f1f1;
    --red-color: #f76570;
    --blue-color:#14b9d5;
    --green-color: #1bbc9b;
    --orange-color:#e27557;
    --yellow-color:#ffd105;

}

html {
  line-height: 1.6rem;
  font-family: 'Asap', sans-serif;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  overflow-x: hidden; }

/* Animation */
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translate(0); }
  to {
    opacity: 1;
    transform: translate(1); } }

@keyframes showSlidebar {
  from {
    transform: translateX(350px); }
  to {
    transform: translateX(0); } }

@keyframes growth {
  from {
    /* transform: scale(0); */
    opacity: 0; }
  to {
    /* transform: scale(1); */
    opacity: 1; } }





/* header content */
.content__header {
  margin-bottom: 35px;
  text-align: center; }

.content__header-decs {
  font-size: 1.4rem;
  line-height: 1.4rem;
  color: #9a9a9a;
  letter-spacing: 2px;
  margin: 0; }

.content__header-heading {
  font-size: 3.6rem;
  line-height: 3.6rem;
  font-weight: 800;
  color: #555;
  margin: 20px 0 0; 
  display: flex;
    justify-content: center;
}

/* under-line boder */
.under-line-effect {
  position: relative;
  display: inline-block;
  z-index: 0 !important; }

.under-line-effect::after {
  content: "";
  position: absolute;
  bottom: -10%;
  right: 0;
  height: 5px;
  width: 100%;
  z-index: -1; }

.under-line-effect.under-line-effect--purple::after {
  background-color: var(--purple-color); }

.under-line-effect.under-line-effect--red::after {
  background-color: #f76570; }

.under-line-effect.under-line-effect--blue::after {
  background-color: var(--blue-color); }

.under-line-effect.under-line-effect--green::after {
  background-color: var(--green-color); }

.under-line-effect.under-line-effect--yellow::after {
  background-color: var(--yellow-color); }

.under-line-effect.under-line-effect--orange::after {
  background-color: var(--orange-color); }

.plus {
  position: relative; }

.plus::after {
  content: "+1";
  position: absolute;
  top: 3px;
  padding: 0 8px;
  margin-left: 7px;
  color: var(--white-color);
  background-color: var(--white-color);
  font-size: 1.2rem;
  line-height: 1.4rem;
  letter-spacing: 4px;
  border-radius: 14px; }

.plus.plus-yellow::after {
  background-color: var(--yellow-color); }

.plus.plus-red::after {
  background-color: var(--red-color); }

.plus.plus-purple::after {
  background-color: var(--purple-color); }

.plus.plus-blue::after {
  background-color: var(--blue-color); }

.plus.plus-orange::after {
  background-color: var(--orange-color); }

.plus.plus-green::after {
  background-color: var(--green-color); }

.mb-20 {
  margin-bottom: 20px;
}

.mb-40 {
  margin-bottom: 40px;
}

.pl-40 {
  padding-left: 40px;
}

/*  */

.main {
  background: #f1f1f1;
  min-height: 100vh;
  display: flex;
  justify-content: center;
}
.form {
  width: 380px;
  min-height: 100px;
  padding: 32px 24px;
  text-align: center;
  background-color: rgb(76, 83, 102);
  border-radius: 20px;
  border : 3px solid #9ec7a7;
  margin: 24px;
  align-self: center;
  box-shadow: 0 2px 5px 0 rgba(51,62,73,.1);
  z-index: 2;
}
.form .heading {
  color :  #ffd452;
}
.form .desc {
  text-align: center;
  color: #ffd452;
  font-size: 1.2rem;
  font-weight: lighter;
  line-height: 2.4rem;
  margin-top: 16px;
  font-weight: 300;
}

.form-group {
  display: flex;
  margin-bottom: 16px;
  flex-direction: column;
}

.form-label,
.form-message {
  text-align: left;
}

.form-label {
  font-weight: 700;
  padding-bottom: 6px;
  line-height: 1.8rem;
  font-size: 1.2rem;
  color: #9ec7a7;
}

.form-control {
  height: 40px;
  padding: 8px 12px;
  border: 3px solid  #9ec7a7;
  color: #9ec7a7;
  background-color: rgb(112, 119, 141);
  border-radius: 3px;
  outline: none;
  font-size: 1.1rem;
}
.form-control::placeholder{
  color: #9ec7a7;
}
.form-control:focus{
  background-color: rgb(112, 119, 141);
}

.form-group.invalid .form-control {
  border-color: #f33a58;
}

.form-group.invalid .form-message {
  color: #f33a58;
}
#password{
  width : 86%;
  border-right: none;
  border-top-left-radius: 3px;
  border-bottom-left-radius: 3px;
}

#reveal-pass{
  width : 14%;
  border : 3px solid #9ec7a7;
  color: #9ec7a7;
  border-left: none;
  border-top-right-radius: 3px;
  border-bottom-right-radius: 3px;
  background: rgb(112, 119, 141);
  cursor: pointer;
}
#reveal-pass:focus{
  outline: none;
}
.form-message {
  font-size: 1.2rem;
  line-height: 1.6rem;
  padding: 4px 0 0;
}

.form-submit {
  outline: none;
  background-image: linear-gradient(to right, rgb(76, 83, 102),rgb(76, 83, 102));
  margin-top: 12px;
  padding: 12px 16px;
  font-weight: 600;
  color: #fff;
  border: 3px solid  #9ec7a7;
  width: 100%;
  font-size: 20px;
  border-radius: 8px;
  cursor: pointer;

}

.form-submit:hover {
  background-image: linear-gradient(to right, #9ec7a7, #8c8cae);
}

.spacer {
  margin-top: 36px;
}

input[readonly] {
  border: 2px solid rgba(0,0,0,0);
}

.bd-t {
  border-top: 1px solid #d8d8d8;
}

.modal-body {
  font-size:25px;
}
.main{
  background: url("./mvc/image/register_background.png") no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    
}
.main::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;

  background: url("./mvc/image/register_background.png") no-repeat center center fixed;
  -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;

  filter: blur(4px);
  z-index: 1;

}

</style>

</body>
</html>