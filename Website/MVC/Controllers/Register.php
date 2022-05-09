<?php
class Register extends Controller{
    public $UserModel;


    public function __construct(){
        //Model
        $this->UserModel = $this->model("UserModel");
        
    }

    public function SayHi(){
        //View
        $this->view("Register");
    }

    // Create key random
    public function Verify($un){
        $key=md5($un).strftime(time());
        return $key;
    }

    public function XuLyDangKy(){
        //1. GET data tu khach hang
        $result_mess=false;
        
        if(isset($_POST["btnRegister"])){
            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $email = $_POST["email"];
            $username = $_POST["username"];
            $password = $_POST["password"];
            $cfmpassword = $_POST["cfmpassword"];
            //Check confirm Password
                $kq = "";
                
                if (strlen($password) <= '8') {
                    $kq = "Your Password Must Contain At Least 8 Characters!";
                    $this->view("Register",[
                        "errPs"=>$kq
                    ]);
                    return false;
                }
                elseif(!preg_match("#[0-9]+#",$password)) {
                    $kq = "Your Password Must Contain At Least 1 Number!";
                    $this->view("Register",[
                        "errPs"=>$kq
                    ]);
                    return false;
                }
                elseif(!preg_match("#['@']+#",$password)) {
                    $kq = "Your Password Must Contain At Least @ Letter!";
                    $this->view("Register",[
                        "errPs"=>$kq
                    ]);
                    return false;
                }
                elseif(!preg_match("#[A-Z]+#",$password)) {
                    $kq = "Your Password Must Contain At Least 1 Capital Letter!";
                    $this->view("Register",[
                        "errPs"=>$kq
                    ]);
                    return false;
                }
                elseif(!preg_match("#[a-z]+#",$password)) {
                    $kq = "Your Password Must Contain At Least 1 Lowercase Letter!";
                    $this->view("Register",[
                        "errPs"=>$kq
                    ]);
                    return false;
                }
                
                if($cfmpassword!=$password){
                    $this->view("Register",[
                        "kq"=>$result_mess
                    ]);
                    return false;
                }
                
            $password = password_hash($password, PASSWORD_DEFAULT); //Mã hóa password băng Bycrpt
            $address=$_POST["Address"];
            $age=$_POST["Age"];
            $phone = $_POST["phone"];
            $token=$this->Verify($username);
            if(empty($_POST["username"]) || empty($_POST["email"])){
                    $this->view("Register",[
                        "result"=>$result_mess
                    ]);
                    return false;
            }else{
                if (!preg_match ("/^[a-zA-Z]+[0-9]*$/",$username)) {
                    $this->view("Register",[
                        "usernameErr"=>$result_mess
                    ]);
                    return false;
                }
                $check=$this->UserModel->CheckUserName($username);
                $checkEmail=$this->UserModel->CheckEmail($email);
    
                if($check==true){
                    $mesUser="Tai khoan nay da tồn tại!!!";
                    $this->view("Register",[
                        "results"=>$mesUser
                    ]);
                    return false;
                }elseif($checkEmail==true){
                    $mesEmail="Email này đã tồn tại !!!";
                    $this->view("Register",[
                       "results"=>$mesEmail
                    ]);
                    return false;
                }
                
                

            }

            //2. INSERT INTO vao DB
            $kq = $this->UserModel->InsertNewUser($username,$password,$email,$firstname,$lastname,$address,$age,$phone,$token);
            
            //3. Thong bao True/False
            $this->view("Verify",[
                "username"=>$username,
                "email"=>$email,
                "token"=>$token
            ]);
            
            
        }

    }
    

    

}

?>