<?php
class Login extends Controller{
    public $UserModel;
    public $BanTinModel;

    public function __construct(){
        //Model
        $this->UserModel = $this->model("UserModel");
        $this->BanTinModel = $this->model("BanTinModel");
    }
    public function SayHi(){
        //View
        $this->view("Login");
    }

    public function XuLyDangNhap()
    {   
        $result_mess=false;
        $LoaiBT=$this->BanTinModel->ShowLoaiBT();
        if(isset($_POST["btnLogin"])){
            $un=$_POST["username"];
            $ps=$_POST["password"];
            
            if(empty($_POST["username"])||empty($_POST["password"])){

                $this->view("Login",[
                    "result"=>"$result_mess"
                ]);
            }elseif($this->UserModel->CheckUserName($un)==false){
                
                echo '<script language="javascript">';
                echo 'alert("Username hay password bị sai!!")';
                echo '</script>';

                // Refresh lại page SignUp
                echo '<script language="Javascript">';
                echo 'window.location="Login"';
                echo '</script>';
                return false;
                
            }
            
            $CheckBlock=$this->UserModel->CheckBlock($un);
            if($CheckBlock==true){ //Acount đã bị block
                echo '<script language="javascript">';
                echo 'alert("Account has blocked! Please contact for Administrator to support.")';
                echo '</script>';

                // Refresh lại page SignUp
                echo '<script language="Javascript">';
                echo 'window.location="Login"';
                echo '</script>';
                return false;
                
            }
            // // Code mẫu không bảo mật tốt
            // $result= $this->UserModel->CheckLogin($un);
            // $Permission=$this->UserModel->CheckPermissionUser($un);
            
            // if(mysqli_num_rows($result)){
            //             while($row=mysqli_fetch_array($result))
            //             {
            //                 $id=$row["id"];
            //                 $username=$row["username"];
            //                 $password=$row["password"];
            //                 $_SESSION["id"]=$id;
            //                 $_SESSION["username"]=$username;
            //                 $ShowUser=$this->UserModel->ShowUser($id);
            //                 $SelectEmail=$this->UserModel->SelectEmail($id);
            //                 $this->view("sendEmailLogin",[
            //                     "page"=>"Home",
            //                     "LoaiBT"=>$LoaiBT,
            //                     "Permission"=>$Permission,
            //                     "User"=>$ShowUser,
            //                     "email"=>$SelectEmail,
            //                     "username"=>$username
            //                 ]);
            //             }
         
            //     }
            // //
            
            $result= $this->UserModel->CheckLogin($un);
            $Permission=$this->UserModel->CheckPermissionUser($un);
            $checkStatus=$this->UserModel->CheckStatus($un);
            
            if($checkStatus==true){
                if(mysqli_num_rows($result)){
                    while($row=mysqli_fetch_array($result))
                    {
                        $id=$row["id"];
                        $username=$row["username"];
                        $password=$row["password"];
                    }
                    if(password_verify($ps,$password)){     //Bảo mật SQL Injection về password khi sử dụng mã hóa BCrypt
                        
                        $_SESSION["id"]=$id;
                        $_SESSION["username"]=$username;
                        setcookie($id,"",time() + 60);
                        $ShowUser=$this->UserModel->ShowUser($id);
                        
                        $this->view("Admin/Home",[
                            "page"=>"Home",
                            "LoaiBT"=>$LoaiBT,
                            "Permission"=>$Permission,
                            "User"=>$ShowUser
                        ]);
                        
                    }
                    else{
                        $CheckFailed=$this->UserModel->CheckFailed($un);
                        if($CheckFailed==true){ 
                            echo '<script language="javascript">';
                            echo 'alert("Account has blocked! Because you failed to enter your password 5 times!!!  Please contact for Administrator to support.")';
                            echo '</script>';
            
                            // Refresh lại page SignUp
                            echo '<script language="Javascript">';
                            echo 'window.location="Login"';
                            echo '</script>';
                            return false;
                        }else{
                            echo '<script language="javascript">';
                            echo 'alert("Username hay password bị sai!!")';
                            echo '</script>';

                            // Refresh lại page SignUp
                            echo '<script language="Javascript">';
                            echo 'window.location="Login"';
                            echo '</script>';
                            return false;
                        }
                    }
    
                }
                else{
                    $this->view("Login",[
                        "result"=>$result_mess
                    ]);
                }
            }else{
                $token=$this->UserModel->SendTokenVerify($un);
                $email=$this->UserModel->SendEmailVerify($un);
                $this->view("Verify",[
                    "token"=>$token,
                    "email"=>$email,
                    "username"=>$un
                ]);
            }
            
            

        }else{
            header("location:Login");
        }
                
        
    }

    
    

}

?>