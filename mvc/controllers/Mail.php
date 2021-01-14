<?php

require_once "./public/thuvien/PHPMailer/src/PHPMailer.php";
require_once "./public/thuvien/PHPMailer/src/Exception.php";
require_once "./public/thuvien/PHPMailer/src/OAuth.php";
require_once "./public/thuvien/PHPMailer/src/POP3.php";
require_once "./public/thuvien/PHPMailer/src/SMTP.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mail extends Controller{
    function guiMail($email_user,$ten_user,$tieudethu,$noidungthu,$motathu){
        $mail = new PHPMailer(true); 
        //cấu hình thông tin người gửi.
        $email_Admin='hangcute.ute@gmail.com';
        $pass_Admin='Thuyhang.ute@123';
        $ten_Admin='BomTanHD Admin';
       
        try {
            //cấu hình server STMP.
            //link tham khảo https://support.google.com/mail/answer/7126229?hl=vi
            $mail->SMTPDebug=0; //kích hoạt chế độ debug, 0 là ko kích hoạt :v, 2 là kích hoạt
            $mail->isSMTP(); //khởi động STMP server
            $mail->Host = 'smtp.gmail.com';//chỉ định server kết nối
            $mail->SMTPAuth = true;//kích hoạt chế độ xác minh tài khoản
            $mail->Username =$email_Admin;//email dùng để gửi
            $mail->Password =$pass_Admin;//pass
            $mail->SMTPSecure = 'tls';//hình thức kết nối
            $mail->Port = 587;//cổng 587 đại diện cho hình thức tls
        
        
            $mail->setFrom($email_Admin,$ten_Admin);// thông tin người gửi
            $mail->addAddress($email_user,$ten_user); //thông tin người nhận
            $mail->addReplyTo($email_user,$ten_user);//thông tin người trả lời=người nhận
           /*  $mail->addCC('');//thêm cc
            $mail->addBCC('');//thêm bcc */
        
          
            //Content
            $mail->isHTML(true);//set nội dung gửi đi là HTML
            $mail->Subject =$tieudethu;//tiêu đề email
            $mail->Body    =$noidungthu;// Nội dung
            $mail->AltBody =$motathu;//Mô tả
        
            $mail->send();
            echo '
            <script>alert("Đã gửi thư thành công");
                location.href="../Account";
            </script>';
        } catch (Exception $e) {
            echo 'Lỗi gửi thư: ', $mail->ErrorInfo;
        }
    }
}
?>