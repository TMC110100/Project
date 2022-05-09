<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Blur login</title>
   <base href="http://localhost/website/">
   <link href="./Public/css/styleSignUp.css" rel="stylesheet" type="text/css" >
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;400;500;600&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
   
  </head>
<body >
  
   <div class="overlay"></div>
   <div class="login-container">
      <div>
         <div class="logo">
            <i class="fas fa-hat-wizard"></i>
            <span>TMC Blog</span>
         </div>
         <div class="register">
            <div>Don't have an account?</div>
            <p>Register to access all the features of our services. Manage your business in one place. It's free</p>
            <div class="social">
               <a data-toggle="tooltip" title="Facebook" href=""><i class="fab fa-facebook-f"></i></a>
               <a data-toggle="tooltip" title="Google" href=""><i class="fab fa-google"></i></a>
               <a data-toggle="tooltip" title="Pinterest" href=""><i class="fab fa-pinterest-p"></i></a>
               <a data-toggle="tooltip" title="Github" href=""><i class="fab fa-github"></i></a>
            </div>
         </div>
      </div>

      <div class="form-login">
         <form action="SignUp/XulyDangKy" method="POST" class="form" id="form-4">
            <div><h3 class="heading" style="text-align:center">Sign Up</h3></div>

            <div class="form-group">
              <label for="text" class="form-label">UserName</label>
              <input id="username" name="username" type="text" placeholder="Trần Minh Cường" class="form-control">
              <span class="form-message"></span>
              <div id="messageUn"></div>
            </div>

            <div class="form-group">
              <label for="password" class="form-label">Password</label>
              <input id="password" name="password" type="password" placeholder="Enter password" class="form-control">
              <span class="form-message"></span>
            </div>

            <div class="form-group">
              <label for="email" class="form-label">Email</label>
              <input id="email" name="email" type="text" placeholder="VD: email@domain.com" class="form-control">
              <span class="form-message"></span>
            </div>

            <div class="form-group">
              <label for="hoten" class="form-label">Họ Tên</label>
              <input id="hoten" name="hoten" type="text" placeholder="VD: Trần Minh Cường" class="form-control">
              <span class="form-message"></span>
            </div>

            <div class="form-group">
              <label for="phone" class="form-label">Số Điện Thoại</label>
              <input id="phone" name="phone" type="text" placeholder="VD: 0356158414" class="form-control">
              <span class="form-message"></span>
            </div>

            <div class="form-group f-term">
               <input id="agree" name="agree" type="checkbox" class="form-control">
               <label for="agree" class="form-label">I agree to the all statements in <a href="">Terms of service</a></label>               
               <span class="form-message"></span>
             </div>
      
            <div class="sign-up">
               <div>
                  <button class="form-submit" name="btnRegister">Sign Up</button>
                  <i class="fas fa-chevron-right"></i>
               </div>
               <div style="float:left">
               <a href="login">Đã có tài khoản!</a>
               <div style="height: 15px"></div>
               <a href="home">Trang chủ</a>
              </div>
            </div>
            <?php
              if(isset($data["results"])){
                    echo $data["results"];
                }
                
              if(isset($data["result"])) { ?>
            <h3><?php
              if($data["result"]==true){
                echo '<script language="javascript">';
                echo 'alert("Đăng ký tài khoản thành công")';
                echo '</script>';

                 // Refresh lại page SignUp
                echo '<script language="Javascript">';
                echo 'window.location="./SignUp"';
                echo '</script>';
              }
              else
              {
                echo " Đăng Ký thất bại";
              }
            ?></h3>
            <?php } ?>
          </form>
      </div>
   </div>
   <?php
                
                if(isset($data["result"])){
                  if($data["result"]==true){

                  }
                  else
                  {
                    echo '<script language="javascript">';
                    echo 'alert("Vui lòng điền đầy đủ thông tin")';
                    echo '</script>';

                    // Refresh lại page SignUp
                    echo '<script language="Javascript">';
                    echo 'window.location="./SignUp"';
                    echo '</script>';
                    
                  }
                }
    ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="./Public/js/style.js"></script>
   <script src="./Public/js/main.js"></script>
</body>
</html>