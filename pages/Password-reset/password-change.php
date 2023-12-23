<?php
session_start();

$page_title = "Password Change Update";
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    body {font-family: Arial, Helvetica, sans-serif;}
    input[type=text], input[type=password] {
        width: 30%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }
    button {
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 17%;
        position: relative;
        left: 20px;
    }
    button:hover {
        opacity: 0.8;
    }
    .py-5{
        text-align: center;
        background-color: #fefefe;
        margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
        border: 1px solid #888;
        width: 80%; /* Could be more or less, depending on screen size */
    }
    .card-header{
        position: relative;
        left: 20px;
    }
    #confirm{
        position: relative;
        right: 20px;
    }
</style>
<body>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <?php
                    if(isset($_SESSION['status'])){
                        ?>
                        <div class="alert alert-success">
                            <h5><?= $_SESSION['status'];?></h5>
                        </div>
                        <?php
                        unset($_SESSION['status']);
                    }
                ?>

                <div class="card">
                    <div class="card-header">
                        <h5>Thay đổi mật khẩu</h5>
                    </div>
                    <div class="card-body p4">
                        <form action="password-reset-code.php" method="POST">
                            <input type="hidden" name ="password_token" value="<?php if(isset($_GET['token'])){echo $_GET['token'];}?>">

                            <div class="form-group mb-3">
                                <label>Email Address</label>
                                <input type="text" name="email" value="<?php if(isset($_GET['email'])){echo $_GET['email'];}?>" class="form-control" placeholder = "Nhập địa chỉ Email">
                            </div>
                            <div class="form-group mb-3">
                                <label>Mật khẩu mới</label>
                                <input type="text" name="new_password" class="form-control" placeholder= "Nhập mật khẩu mới" minlength="6" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Mật khẩu phải có ít nhất 1 ký tự viết hoa, 1 ký tự viết thường, 1 ký tự số và phải có ít nhất 6 ký tự" required>
                            </div>
                            <div class="form-group mb-3" id ="confirm">
                                <label>Xác nhận mật khẩu</label>
                                <input type="text" name="confirm_password" class="form-control" placeholder= "Nhập lại mật khẩu">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name ="password_update" class="btn btn-success w-100">Thay đổi mật khẩu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>