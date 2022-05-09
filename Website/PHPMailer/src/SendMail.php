<base href="http://localhost/website/">
<?php

include "./PHPMailer.php";
include "./Exception.php";
include "./OAuth.php";
include "./POP3.php";
include "./SMTP.php";
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$email=$_POST["email"];
$title=$_POST["hoten"];
$ten=$_POST["username"];
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'tranminhcuong1101@gmail.com';                 // SMTP username
    $mail->Password = 'gyjrfutztrropuca';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
 
    //Recipients
    $mail->setFrom('tranminhcuong1101@gmail.com', 'Cuong Minh');
    $mail->addAddress($email);               // Name is optional
    $mail->addCC('cuongtm.it@gmail.com');
    //$mail->addReplyTo('tmc110100@gmail.com', 'Information');
    
    
 
    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
 
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $title;
    $mail->Body    = "Thank you is contact from <b>$ten</b>";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
    if($mail->send()){
        header("location:../../Contact");
    }
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

?>