<?php
class Sources extends Controller{
    public $UserModel;
    public $BanTinModel;

    public function __construct(){
        $this->UserModel = $this->model("UserModel");
        $this->BanTinModel = $this->model("BanTinModel");
    }

    public function SayHi()
    {
        
        $this->view("source");
    }


}
?>