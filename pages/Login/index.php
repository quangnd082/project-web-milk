<?php
     include("../../admincp/config/config.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
body {
    background-image: url("Sua_signup.jpg");
}
.notice{
    text-align: center;
    position: relative;
    top: 250px;
    
}
.psw-yet{
  text-align: center;
}
</style>
</head>
<body>

  
  <form id="loginForm" class="modal-content animate" action="login.php" method="POST">


    <div class="container">
      <label for="username"><b>Tài khoản</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>

      <label for="psw"><b>Mật khẩu</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit" name="submit" onclick="return validateLoginForm()">Login</button>

      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
    <a href="/TDQMilk/index.php" style="text-decoration: none; color: #fff"><button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button></a>
      <span class="psw"><a href="../Password-reset/resetpsw.php">Quên mật khẩu?</a></span>
      <span class="psw-yet">Chưa có tài khoản hãy <a href="../Signup/index.php">đăng kí?</a></span>
    </div>
  </form>
  <script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "";
  }
}
</script>
<!-- Đặt mã JavaScript trong thẻ <script> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function validateLoginForm() {
    var form = document.getElementById("loginForm");
    var username = form.elements["username"].value;
    var password = form.elements["psw"].value;

    // Kiểm tra nếu bất kỳ trường nào bị bỏ trống
    if (username === "" || password === "") {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Vui lòng điền đầy đủ thông tin để đăng nhập!',
      });
      return false; // Ngăn form được submit nếu có trường bị bỏ trống
    }
    return true; // Cho phép form được submit nếu hợp lệ
  }
</script>

</body>
</html>
