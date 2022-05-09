<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register Member</title>
        <base href="localhost">
        <link href="./Public/css/styleRegister.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bgRegister">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form action="Register/XulyDangKy" method="POST" class="form" id="form-4">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" name="firstname" type="text" placeholder="Enter your first name" required/>
                                                        <label for="inputFirstName">First name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputLastName" name="lastname" type="text" placeholder="Enter your last name" required/>
                                                        <label for="inputLastName">Last name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com" required/>
                                                <label for="inputEmail">Email address</label>
                                                <span class="form-message"></span>
                                                <div id="messageEmail"></div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="username" name="username" type="text" placeholder="tmc110100" required/>
                                                <label for="text">User name</label>
                                                <span class="form-message"></span>
                                                <div id="messageUn"></div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="password" name="password" type="password" placeholder="Create a password" required/>
                                                        <label for="inputPassword">Password</label>
                                                        <span class="form-message"></span>
                                                        <div id="messagePs" class='text-danger'>
                                                            <?php
                                                            if(isset($data["errPs"])) { 
                                                                
                                                                
                                                                    echo $data["errPs"];
                                                                    
                
                                                            }
                                                               
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPasswordConfirm" name="cfmpassword" type="password" placeholder="Confirm password" required/>
                                                        <label for="inputPasswordConfirm">Confirm Password </label>
                                                        <span id='message'></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="Address" name="Address" type="text" placeholder="VD: Go Vap" required/>
                                                <label for="inputAddress">Address</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-6 col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="phone" name="phone" type="tel" placeholder="VD: 0356158414" pattern="[0-9]{10}" required/>
                                                        <label for="inputPhone">Phone</label>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="Age" name="Age" type="date" placeholder="Birthday" required/>
                                                        <label for="inputAge">Birthday</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid">
                                                    <button class="btn btn-primary btn-block" name="btnRegister">Create Account</button>
                                                </div>
                                            </div>
                                            <?php
                                                if(isset($data["results"])){
                                                        echo $data["results"];
                                                    }
                                                    
                                                if(isset($data["kq"])) { ?>
                                                <h3><?php
                                                if($data["kq"]==false){
                                                    echo '<script language="javascript">';
                                                    echo 'alert("Đăng ký tài khoản thất bại")';
                                                    echo '</script>';

                                                    // Refresh lại page SignUp
                                                    echo '<script language="Javascript">';
                                                    echo 'window.location="register"';
                                                    echo '</script>';
                                                }
                                                
                                                ?></h3>
                                                <?php } ?>

                                                <?php
                                                    if(isset($data["usernameErr"])){
                                                        echo '<script language="javascript">';
                                                        echo 'alert("Only letters and numbers allowed")';
                                                        echo '</script>';

                                                        // Refresh lại page SignUp
                                                        echo '<script language="Javascript">';
                                                        echo 'window.location="register"';
                                                        echo '</script>';
                                                    }
                                                ?>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login">Have an account? Go to login</a></div>
                                        <br>
                                        <div class="small"><a href="home">Go Back HomePage</a></div>
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
                            echo 'window.location="register"';
                            echo '</script>';
                            
                        }
                        }
            ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="./Public/js/scripts.js"></script>
        <script src="./Public/js/main.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $('#password, #inputPasswordConfirm').on('keyup', function () {
                if ($('#password').val() == $('#inputPasswordConfirm').val()) {
                    $('#message').html('Invalid').css('color', 'green');
                } else 
                    $('#message').html('Not Invalid').css('color', 'red');
            });
        </script>
    </body>
</html>

