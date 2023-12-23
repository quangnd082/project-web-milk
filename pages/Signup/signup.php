<?php
    session_start();
    include("../../admincp/config/config.php");
    if(isset($_POST['submit'])){
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $birthday = mysqli_real_escape_string($conn,$_POST['birthday']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password = mysqli_real_escape_string($conn,$_POST['psw']);
        $cpassword = mysqli_real_escape_string($conn,$_POST['psw-repeat']);

        $sql = "select * from tbl_signup where username='$username'";
        $result = mysqli_query($conn, $sql);
        $count_user = mysqli_num_rows($result);

        $sql = "select * from tbl_signup where email='$email'";
        $result = mysqli_query($conn, $sql);
        $count_email = mysqli_num_rows($result);


        if($count_user == 0 & $count_email == 0){
            if($password == $cpassword){
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO tbl_signup(username, birthday,email, password) VALUES('$username','$birthday','$email','$hash')";
                $result = mysqli_query($conn, $sql);
                if($result){
                    echo '<script>
                        alert("Đăng kí thành công, vui lòng đăng nhập");
                        window.location.href="../Login/index.php";
                    </script>';
                    $_SESSION['signup'] = $username; 

                }
            } else {
                echo '<script>
                window.location.href="index.php";
                alert("Mật khẩu không khớp !!");
            </script>';
            }
        } else {
            if($count_user > 0){
                echo '<script>
                    window.location.href="index.php";
                    alert("Username already exists !!")
                </script>';
            }
            if($count_email > 0){
                echo '<script>
                    window.location.href="index.php";
                    alert("Email already exists !!")
                </script>';
            }
        }
    }
?>