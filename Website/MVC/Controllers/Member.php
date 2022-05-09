<?php
class Member extends Controller{
    public $UserModel;
    public $BanTinModel;

    public function __construct(){
        //Model
        $this->UserModel = $this->model("UserModel");
        $this->BanTinModel = $this->model("BanTinModel");
    }
    public function SayHi(){
        $User=$this->UserModel->CheckMembers();

        $this->view("ProfileMember",[
            "member"=>$User
        ]);

    }
}

?>