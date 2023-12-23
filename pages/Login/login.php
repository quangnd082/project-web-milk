<?php
    session_start();
    include("../../admincp/config/config.php");
    if(isset($_POST['submit'])){
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password = mysqli_real_escape_string($conn,$_POST['psw']);


        $sql = "select * from tbl_signup where username='$username' or email='$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if($row){
            if(password_verify($password, $row["password"])){
                $_SESSION['login'] = $row['username'];
                $_SESSION['id'] = $row['id'];          
                echo '<script>
                    window.location.href="../../index.php";
                </script>';
            }else{
                echo '<script>
                alert("Mật khẩu không hợp lệ");
                window.location.href="index.php";
            </script>';
            }
        } else{
            echo '<script>
                alert("Tài khoản không hợp lệ!!");
                window.location.href="index.php";
            </script>';
        }
    }
?>