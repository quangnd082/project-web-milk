<?php
     include("../../admincp/config/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-up</title>
</head>
<body>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
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
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
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
  background-color: #474e5d;
  padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
 
/* The Close Button (x) */
.close {
  position: absolute;
  right: 35px;
  top: 15px;
  font-size: 40px;
  font-weight: bold;
  color: #f1f1f1;
}

.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
.notice{
    text-align: center;
    position: relative;
    top: 250px;
    
}
body {
    background-image: url("Sua_signup.jpg");
}
#birthday{
  position: relative;
  top:10px;
  margin-bottom: 20px;
  width: 100%;
  padding: 15px;
  background-color: #f1f1f1;
  border: none;
}
#check{
  margin-top:10px;
  margin-bottom: 20px;
}
#myInput{
  margin-bottom: 10px;
}
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

</style>
<body>
  <form class="modal-content animate" id="signupForm" action="signup.php" method ="POST">
    <div class="container">
      <h1>Đăng kí</h1>
      <p>Hãy điền đủ thông tin để tạo tài khoản.</p>
      <hr>
      <label for="username"><b>Tài khoản</b></label>
      <input type="text" placeholder="Enter Username" name="username" required minlength="5">

      <form action="/action_page.php">
        <label for="birthday"><b>Ngày sinh</b></label> <br>
        <input type="date" id="birthday" name="birthday">
      </form> <br>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>

      <label for="psw"><b>Mật khẩu</b></label>
      <input type="password" placeholder="Enter Password" name="psw" id="myInput" minlength="6" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Mật khẩu phải có ít nhất 1 ký tự viết hoa, 1 ký tự viết thường, 1 ký tự số và phải có ít nhất 6 ký tự" required>
      <input type="checkbox" onclick="myFunction()" id ="check">Show Password <br>
      <script>
        function myFunction() {
          var x = document.getElementById("myInput");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        } 
      </script>

      <label for="psw-repeat"><b>Nhập lại mật khẩu</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
      
      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
      </label>

      <p>Bạn đã có tài khoản hãy <a href="../Login/index.php" style="color:dodgerblue">Đăng nhập</a>.</p>

      <div class="clearfix">
      <a href="/TDQMilk/index.php" style="text-decoration: none; color: #fff"><button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button></a>
      <button type="submit" name="submit" class="signupbtn" onclick="return validateSignupForm()">Sign Up</button>

      </div>
    </div>
  </form>


<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<!-- Đặt mã JavaScript trong thẻ <script> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function validateSignupForm() {
        var form = document.getElementById("signupForm");
        var username = form.elements["username"].value;
        var birthday = form.elements["birthday"].value;
        var email = form.elements["email"].value;
        var psw = form.elements["psw"].value;
        var pswRepeat = form.elements["psw-repeat"].value;

        var errorMessage = "";

        if (username.length < 5) {
            errorMessage += "Tên tài khoản phải có ít nhất 5 ký tự.\n";
        }

        if (birthday === "") {
            errorMessage += "Vui lòng chọn ngày sinh.\n";
        }

        if (email === "") {
            errorMessage += "Vui lòng điền địa chỉ email.\n";
        } else if (!validateEmail(email)) {
            errorMessage += "Địa chỉ email không hợp lệ.\n";
        }

        if (psw.length < 6) {
            errorMessage += "Mật khẩu phải có ít nhất 6 ký tự.\n";
        } else if (!validatePassword(psw)) {
            errorMessage += "Mật khẩu phải có ít nhất 1 ký tự viết hoa, 1 ký tự viết thường, 1 ký tự số và không chứa ký tự đặc biệt.\n";
        }

        if (psw !== pswRepeat) {
            errorMessage += "Mật khẩu không khớp.\n";
        }

        if (errorMessage !== "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: errorMessage,
            });
            return false;
        }

        return true;
    }

    // Hàm kiểm tra định dạng email
    function validateEmail(email) {
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }

    // Hàm kiểm tra mật khẩu
    function validatePassword(psw) {
        var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/;
        return re.test(psw);
    }
</script>

</body>
</html>