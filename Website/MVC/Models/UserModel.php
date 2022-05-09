<?php

class UserModel extends DB{
    public function CheckUserName($un)
    {   
        if (!preg_match ("/^[a-zA-Z]+[0-9]*$/", $un) ){ //Bảo mật về SQL Injection về username
            $kq = false;   
            return $kq; 
        }else{
            $qr = "SELECT id FROM user WHERE username='$un'"; 
            $rows = mysqli_query($this->con,$qr);
            $kq = false;           
            if(mysqli_num_rows($rows) > 0)
            {                
                $kq =true ;
            }
            return $kq;

        }
        
    }

    public function InsertNewUser($username,$password,$email,$firstname,$lastname,$address,$age,$phone,$token)
    {   
        $qr = "INSERT INTO user values(null,'$username','$password','$email','$firstname','$lastname','$firstname $lastname','$address','$age','$phone',0,'$token',0,'avatar.png',0,0)";
        
        $result = false;
        if(mysqli_query($this->con, $qr)){
            $result = true;
            
        }
        return json_encode($result); //Trả vê JSON
    }
    
    

    public function SendTokenVerify($username){
        $qr="SELECT token FROM user Where username='$username'";
        $row=mysqli_query($this->con,$qr);
        $rows=mysqli_fetch_array($row);
        $token=$rows["token"];
        return $token;
    }

    public function SendEmailVerify($username){
        $qr="SELECT email FROM user Where username='$username'";
        $row=mysqli_query($this->con,$qr);
        $rows=mysqli_fetch_array($row);
        $email=$rows["email"];
        return $email;
    }

    public function CheckUser($un)
    {
        $qr = "SELECT id FROM user WHERE username='$un'";
        $rows = mysqli_query($this->con,$qr);
        $kq = "<div class='text-success'>Tên tài khoản hợp lệ </div>";
        
        if(mysqli_num_rows($rows) > 0)
        {
            $kq ="<div class='text-danger'>Tài khoản này đã có người dùng! </div>" ;
        }
        return $kq;
    }
    public function CheckLogin($un)
    {
        $qr = "SELECT * FROM user WHERE username='$un'";
        
        return mysqli_query($this->con, $qr) ;
         
    }
    public function CheckEmailAjax($email)
    {
        $qr = "SELECT id FROM user WHERE email='$email'";
        $rows = mysqli_query($this->con,$qr);
        $kq = "";
        
        if(mysqli_num_rows($rows) > 0)
        {
            $kq ="<div class='text-danger'>Email này đã có người sử dụng! </div>" ;
        }
        return $kq;
    }
    public function CheckEmail($email)
    {
        $qr = "SELECT id FROM user WHERE email='$email'";
        $rows = mysqli_query($this->con,$qr);
        $kq = false;
        
        if(mysqli_num_rows($rows) > 0)
        {
            $kq =true ;
        }
        return $kq;
    }

    public function SelectEmail($id)
    {
        $qr = "SELECT email FROM user WHERE id='$id'";
        $row = mysqli_query($this->con,$qr);
        $rows = mysqli_fetch_array($row);
        $email=$rows["email"];
        return $email;
    }

    public function CheckPermissionUser($un){
        $qr = "SELECT * FROM user where  username='$un' and permission=1 ";
        $row= mysqli_query($this->con, $qr);
        $result = false;
        if(mysqli_num_rows($row) == 1){
            $result = true;
        }
        return $result;
    }

    public function CheckStatus($un){
        $qr = "SELECT * FROM user where  username='$un' and status=1 ";
        $row= mysqli_query($this->con, $qr);
        $result = false;
        if(mysqli_num_rows($row) == 1){
            $result = true;
        }
        return $result;
    }

    public function CheckStatusUser($token){
        $qr = "SELECT * FROM user where token='$token' and status=0 ";
        $row= mysqli_query($this->con, $qr);
        $result = false;
        if(mysqli_num_rows($row) == 1){
            $qr = "UPDATE user SET status=1 WHERE token='$token' ";
            $row= mysqli_query($this->con, $qr);
            $result = true;
        }
        return $result;
    }

    public function CheckMembers(){
        $qr="SELECT * FROM user";
        return mysqli_query($this->con,$qr);
    }

    public function DeleteUser($id){
        
        $qr="DELETE FROM user WHERE id=$id";
        $result = false;
        if(mysqli_query($this->con, $qr) ){
            $result = true;
        }
        return $result; 

    }

    public function ShowUser($id){
        $qr="SELECT * FROM user WHERE id=$id";
        return mysqli_query($this->con,$qr);
    }

    public function ChangeAvatar($id,$avatar){
        $qr = "UPDATE user SET avatar='$avatar' WHERE id=$id";
        
        $result = false;
        if(mysqli_query($this->con, $qr) ){
            $result = true;
            
        }
        return $result; 
    }
    public function CheckBlock($un){
        $qr = "SELECT * FROM user where  username='$un' and blocked=1 ";
        $row= mysqli_query($this->con, $qr);
        $result = false;
        if(mysqli_num_rows($row) == 1){
            $result = true;
        }
        return $result;
    }

    public function BlockUser($un,$email){
        $qr = "UPDATE user SET blocked=1  WHERE username='$un' AND email='$email'";
        mysqli_query($this->con, $qr);
        $result = true;
        return $result;
    }

    public function CheckFailed($un){
        $qr = "UPDATE user SET failed=failed+1 WHERE username='$un'";
        mysqli_query($this->con, $qr);

        $kq = "SELECT * FROM user WHERE username='$un' and failed=5 ";
        $row= mysqli_query($this->con, $kq);
        $result = false;
        if(mysqli_num_rows($row) == 1){
            $qrs = "UPDATE user SET blocked=1 , failed=0 WHERE username='$un'";
            mysqli_query($this->con, $qrs);
            $result = true;
        }
        return $result;
    }

    public function ShowUsersBlocked(){
        $qr="SELECT * FROM user WHERE blocked=1";
        return mysqli_query($this->con,$qr);
    }

    public function UserUnlock($id){
        $qr = "UPDATE user SET blocked=0 WHERE id=$id";
        
        $result = false;
        if(mysqli_query($this->con, $qr) ){
            $result = true;
            
        }
        return $result; 
    }

}
?>