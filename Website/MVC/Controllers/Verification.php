<?php
class Verification extends Controller{
    public $UserModel;

    public function __construct(){
        //Model
        $this->UserModel = $this->model("UserModel");
    }

    public function SayHi(){
        if(isset($_GET["token"])){
            $token=$_GET["token"];
            $checkstatus=$this->UserModel->CheckStatusUser($token);
            $this->view("Verification",[
            "result"=>$checkstatus
        ]);
        }else{
            $this->view("Verification");
        }
    }
}
?>