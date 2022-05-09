<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang xac nhan account</title>
</head>
<body>
    <?php
    if(isset($data["result"])){
        if($data["result"]==true){
            echo '<script language="javascript">';
            echo 'alert("Xác nhận KHÓA tài khoản thành công.")';
            echo '</script>';

            echo '<script language="Javascript">';
            echo 'window.location="Login"';
            echo '</script>';
            
            
        }else{
            echo '<script language="javascript">';
            echo 'alert("Tài Khoản này đã bị KHÓA rồi.")';
            echo '</script>';

            echo '<script language="Javascript">';
            echo 'window.location="Home"';
            echo '</script>';
            
        }
    }
    ?>
</body>
</html>