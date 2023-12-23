<?php
include("../../admincp/config/config.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'vendor/autoload.php';
function send_password_reset($get_name, $get_email,$token){
    $mail = new PHPMailer(true);
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'anhduong180202@gmail.com';                     //SMTP username
    $mail->Password   = 'hnbvyepqqlkdfqox';                               //SMTP password
    $mail->SMTPSecure = 'tls';             //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('anhduong180202@gmail.com', $get_name);
    $mail->addAddress($get_email);     //Add a recipient
   
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Reset Password Notification';

    $email_template = "
        <h2>Xin chào<h2>
        <h3>Bạn đang nhận được email bởi vì chúng tôi vừa gửi password reset yêu cầu đến tài khoản của bạn.</h3>
        <br/><br/>
        <a href ='http://localhost:8080/TDQMilk/pages/Password-reset/password-change.php?token=$token&email=$get_email'> Click me </a>
    ";

    $mail->Body = $email_template;
    $mail->send();
}
class Mailer{
    
    function dathangmail($tieude, $noidung, $maildathang){
        $mail = new PHPMailer(true);
        $mail -> CharSet = 'utf8';
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'anhduong180202@gmail.com';                     //SMTP username
        $mail->Password   = 'hnbvyepqqlkdfqox';                               //SMTP password
        $mail->SMTPSecure = 'tls';             //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('anhduong180202@gmail.com', 'Thông báo đơn hàng tại web suatuoinguyenchat.com');
        $mail->addAddress($maildathang);     //Add a recipient
       
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $tieude;
     
        $mail->Body = $noidung;
        $mail->send();
    }
}
if(isset($_POST['password_reset_link'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $token = md5(rand());

    $check_email = "SELECT email, username FROM tbl_signup WHERE email='$email' LIMIT 1";
    $check_email_run = mysqli_query($conn, $check_email);

    if(mysqli_num_rows($check_email_run) > 0){
        $row = mysqli_fetch_array($check_email_run);
        $get_name = $row['username'];
        $get_email = $row['email'];

        $update_password = "UPDATE tbl_signup SET password='$token' WHERE email='$get_email' LIMIT 1";
        $update_password_run = mysqli_query($conn, $update_password);
         if($update_password_run){
            send_password_reset($get_name, $get_email,$token);
            $_SESSION['status'] = "Chúng tôi đã gửi emai cho bạn để cài đặt lại mật khẩu";
            header("Location: resetpsw.php");
            exit(0);
         }else{
            $_SESSION['status'] = "Đã xảy ra lỗi!!!";
            header("Location: resetpsw.php");
            exit(0);
         }

    }else{
        $_SESSION['status'] = "Không tìm thấy Email";
        header("Location: resetpsw.php");
        exit(0);
    }
}

if(isset($_POST['password_update'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $token = mysqli_real_escape_string($conn, $_POST['password_token']);

    if(!empty($token)){
        if(!empty($email) && !empty($new_password) && !empty($confirm_password)){
            //Checking token is Valid or not
            $check_token = "SELECT password FROM tbl_signup WHERE password='$token' LIMIT 1";
            $check_token_run = mysqli_query($conn, $check_token);

            if(mysqli_num_rows($check_token_run) > 0){
                if($new_password == $confirm_password){
                    $hash_password = password_hash($new_password, PASSWORD_DEFAULT);
                    $update_password = "UPDATE tbl_signup SET password='$hash_password' WHERE password='$token' LIMIT 1";
                    $update_password_run = mysqli_query($conn, $update_password);

                    if($update_password_run){
                        $_SESSION['status'] = "Mật khẩu mới đã được cập nhật thành công";
                        header("Location: ../Login/index.php");
                        exit(0);
                    }else{
                        $_SESSION['status'] = "Không thể cập nhật mật khẩu. Có lỗi xảy ra";
                        header("Location: password-change.php?token=$token&email=$email");
                        exit(0);
                    }
                }else{
                    $_SESSION['status'] = "Mật khẩu và Xác nhận lại mật khẩu không khớp";
                    header("Location: password-change.php?token=$token&email=$email");
                    exit(0);
                }
            }else{
                $_SESSION['status'] = "Mã thông báo không hợp lệ";
                header("Location: password-change.php?token=$token&email=$email");
                exit(0);
            }
        }else{
            $_SESSION['status'] = "Hãy điền đủ thông tin";
            header("Location: password-change.php?token=$token&email=$email");
            exit(0);
        }
    }else{
        $_SESSION['status'] = "Không có mã thông báo";
        header("Location: password-change.php");
        exit(0);
    }
}
?>
