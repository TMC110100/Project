<?php
    if(isset($_SESSION["id"])){
        header("location:Admin/Home");
    }
?>
<?php
              if(isset($data["result"])){
                  if($data["result"]==true)
                  {
                     
                  }
                  else{?>
                      <h5><?php
                        echo "Dang nhap that bai";
                      ?></h5>

                    <?php
                  }
              }
            ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login Member</title>
        <base href="http://localhost/website/">
        <link href="./Public/css/styleRegister.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bgLogin">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                    <form action="./Login/XuLyDangNhap" method="POST" class="form" id="form-2">
                                        <div class="spacer"><?php
                                            if(isset($data["result"])){
                                                if($data["result"]==true)
                                                {
                                                    
                                                }
                                                else{
                                                        echo '<script language="javascript">';
                                                        echo 'alert("Đăng nhập thất bại!! Vui lòng điền đầy đủ thông tin")';
                                                        echo '</script>';

                                                        // Refresh lại page SignUp
                                                        echo '<script language="Javascript">';
                                                        echo 'window.location="Login"';
                                                        echo '</script>';
                                                }
                                            }
                                            ?></div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputUsername" name="username" type="text" placeholder="username" required />
                                                <label for="inputUsername">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword"  name="password" type="password" placeholder="Password"  required />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Forgot Password?</a>
                                                <button class="btn btn-primary" name="btnLogin">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="Register">Need an account? Sign up!</a></div>
                                        <br>
                                        <div class="small"><a href="Home">Go Back HomePage</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div>
                <footer class="py-4 bg-light mt-auto">
                    <div class="text-center" >Copyright &copy; TMC Website 2021</div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="./Public/js/scripts.js"></script>
    </body>
</html>
